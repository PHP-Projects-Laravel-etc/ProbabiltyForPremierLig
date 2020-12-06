<?php


namespace App\MatchEngine;


use Carbon\Carbon;

class LigPlan
{
    public static function createPlan($teams)
    {
        $plan = [];
        for ($i = 0; $i < count($teams); $i++) {
            $date = Carbon::now();
            $date = 1;
            for ($j = 0; $j < count($teams); $j++) {
                if ($teams[$i] == $teams[$j]) {
                    continue;
                }
                $plan[] = [
                    'home_team_id' => $teams[$i],
                    'away_team_id' => $teams[$j],
                    'week'   => $date,
                ];
                $date += 1;
            }
        }
        return $plan;
    }
}
