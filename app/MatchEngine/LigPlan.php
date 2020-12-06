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
            for ($j = 0; $j < count($teams); $j++) {
                $date = $date->add('week',1);
                if ($teams[$i] == $teams[$j]) {
                    continue;
                }
                $plan[] = [
                    'home_team_id' => $teams[$i],
                    'away_team_id' => $teams[$j],
                    'match_date'   => $date,
                ];
            }
        }
        return $plan;
    }
}
