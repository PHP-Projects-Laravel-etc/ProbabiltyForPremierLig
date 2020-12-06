<?php


namespace App\MatchEngine;


use App\Models\Team;
use App\Models\TeamMatches;

class Simulation
{

    public function runSimulationForAllTeams($matches): array
    {

        $fixture = [];
        dd($matches);
        foreach ($matches as $match) {
            $homeTeam = $match->homeTeam;
            $awayTeam = $match->awayTeam;
            $matchToRun = new MatchGame($homeTeam, $awayTeam);
            $result = $matchToRun->runGame();
            $match->away_team_score = $result['scoreForHome'];
            $match->home_team_score = $result['scoreForAway'];
            $homeTeam->updateTeamStatusWithoutSave($match->home_team_score, $match->away_team_score);
            $awayTeam->updateTeamStatusWithoutSave($match->away_team_score, $match->home_team_score);
            if (!isset($fixture[$homeTeam->name])) {
                $fixture[$homeTeam->name] = [
                    'scores'          => 0,
                    'goalsDifference' => 0,
                ];
            }
            $fixture[$homeTeam->name]['scores'] += $homeTeam->pointsWon();
            $fixture[$homeTeam->name]['goalsDifference'] += $matchToRun->getGoalDifference($match->home_team_score, $match->away_team_score);
        }
        dd($fixture);
    }
}
