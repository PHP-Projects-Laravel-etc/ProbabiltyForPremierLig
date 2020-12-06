<?php


namespace App\MatchEngine;


use App\Models\TeamMatches;
use Carbon\Carbon;

class LigPlan
{
    public static function createPlan($firstArray): array
    {
        $week = [];
        $date = 1;
        for ($i = 0; $i < 3; $i++) {
            $week[$i][0] =
                [
                    'home_team_id' => $firstArray[0],
                    'away_team_id' => $firstArray[$i + 1],
                    'week'         => $date,
                ];
            $remaining = $firstArray;
            array_splice($remaining, 0, 1);
            array_splice($remaining, $i, 1);
            $week[$i][1] =
                [
                    'home_team_id' => $remaining[0],
                    'away_team_id' => $remaining[1],
                    'week'         => $date,
                ];

            $week[$i + 3][0] =
                [
                    'home_team_id' => $week[$i][0]['away_team_id'],
                    'away_team_id' => $week[$i][0]['home_team_id'],
                    'week'         => $date + 3,
                ];
            $week[$i + 3][1] =
                [
                    'home_team_id' => $week[$i][1]['away_team_id'],
                    'away_team_id' => $week[$i][1]['home_team_id'],
                    'week'         => $date + 3,
                ];

            $date++;
        }
         ksort($week);
        return $week;
    }

    public static function getPlanWithImportantData(): array
    {
        $matches = TeamMatches::where('played', false)->get();
        $matchesForTeam = [];
        foreach ($matches as $match) {
            $newArray = [
                'homeTeam' => $match->homeTeam->name,
                'awayTeam' => $match->awayTeam->name,
            ];
            if (!isset($matchesForTeam[$match->homeTeam->id])) {
                $matchesForTeam[$match->homeTeam->id] = [];
            }
            array_push($matchesForTeam[$match->homeTeam->id], $newArray);
        }
        return $matchesForTeam;
    }


}
