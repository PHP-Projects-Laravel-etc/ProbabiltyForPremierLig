<?php


namespace App\MatchEngine;


use App\Models\Team;
use App\Models\TeamMatches;

class Simulation
{

    public function runSimulationForAllTeams($matches): array
    {
        $points = [];
        $average = [];

        $teams = Team::all();
        foreach ($teams as $team) {
            $points[$team->name] = $team->points;
            $average[$team->name] = $team->points;
        }
        foreach ($matches as $match) {
            $homeTeam = $match->homeTeam;
            $awayTeam = $match->awayTeam;
            $matchToRun = new MatchGame($homeTeam, $awayTeam);
            $result = $matchToRun->runGame();
            $match->away_team_score = $result['scoreForHome'] ? : 0;
            $match->home_team_score = $result['scoreForAway'] ? : 0;
            $homeTeam->updateTeamStatusWithoutSave($match->home_team_score, $match->away_team_score);
            $awayTeam->updateTeamStatusWithoutSave($match->away_team_score, $match->home_team_score);
            if (!isset($points[$homeTeam->name])) {
                $points[$homeTeam->name] = 0;
                $average[$homeTeam->name] = 0;
            }
            $points[$homeTeam->name] += $homeTeam->pointsWon();
            $average[$homeTeam->name] += $matchToRun->getGoalDifference($match->home_team_score, $match->away_team_score);

            if (!isset($points[$awayTeam->name])) {
                $points[$awayTeam->name] = 0;
                $average[$awayTeam->name] = 0;
            }
            $points[$awayTeam->name] += $awayTeam->pointsWon();
            $average[$awayTeam->name] += $matchToRun->getGoalDifference($match->away_team_score, $match->home_team_score);
        }
        arsort($points);
        arsort($average);
        $pointValues = array_values($points);
        $averageValues = array_values($points);
        if ($pointValues[0] == $pointValues[1]) {
            return ( array_keys($average, max(array_splice($average,0,2))) );
        }
        return ( array_keys($points, max($points)) );
    }

    public function runSimulationForHundredTimesForProbability($matches)
    {
        $winTimes = [];
        for ($i = 0; $i < 100; $i++) {
            $winner = $this->runSimulationForAllTeams($matches);
            if (!isset($winTimes[$winner[0]])) {
                $winTimes[$winner[0]] = 0;
            } else {
                $winTimes[$winner[0]] += 1;
            }
        }
        return $winTimes;
    }
}
