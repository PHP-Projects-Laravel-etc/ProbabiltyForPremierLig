<?php


namespace App\MatchEngine;


use App\MatchEngine\TeamStats\AgilityStatCalculator;
use App\MatchEngine\TeamStats\IntelligenceStatCalculator;
use App\MatchEngine\TeamStats\StrengthStatCalculator;
use App\Models\Team;

class MatchGame
{
    /**
     * @var Team
     */
    protected $awayTeam;
    /**
     * @var Team
     */
    protected $homeTeam;

    public function __construct(Team $homeTeam, Team $awayTeam)
    {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
    }


    public function getPowerOfTeam(Team $team): int
    {
        $strength = new StrengthStatCalculator();
        $agility = new AgilityStatCalculator();
        $intelligence = new IntelligenceStatCalculator();
        return ($team->overall_strength * $strength->weight() ) +  ($team->overall_agility * $agility->weight()) + ($team->overall_intelligence * $intelligence->weight());
    }

    public function chancesToShoot(Team $team): int
    {
        return $this->getPowerOfTeam($team) / 10;
    }

    public function chancesToScore(Team $team): int
    {
        return $this->getPowerOfTeam($team) / 5;
    }

    public function runGameForTeam(Team $team): int
    {
        $score = 0;
        for ($i = 0; $i < $this->chancesToShoot($team); $i++) {
            if (rand(1, 100) < $this->chancesToScore($team)) {
                $score++;
            }
        }
        return $score;
    }

    public function runGame(): array
    {
        $scoresForHome = $this->runGameForTeam($this->homeTeam);
        $scoresForAway = $this->runGameForTeam($this->awayTeam);
        return [
            'scoreForHome' => $scoresForHome,
            'scoreForAway' => $scoresForAway,
        ];
    }


    public function getGoalDifference($scoresForTeam, $scoresForAgainstTeam) {
        return $scoresForTeam - $scoresForAgainstTeam;
    }


}
