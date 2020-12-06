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
        return ( new StrengthStatCalculator(new IntelligenceStatCalculator(new AgilityStatCalculator($team->overall_agility), $team->overall_intelligence), $team->overall_strength) )->result();
    }

    public function chancesToShoot(Team $team): int
    {
        return $this->getPowerOfTeam($team) / 10;
    }

    public function chancesToSore(Team $team): int
    {
        return $this->getPowerOfTeam($team) / 15;
    }

    public function runGameForTeam(Team $team): int
    {
        $score = 0;
        for ($i = 0; $i < $this->chancesToShoot($team); $i++) {
            if (rand(1, 100) > $this->chancesToSore($team)) {
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
}
