<?php

namespace App\Http\Controllers;

use App\MatchEngine\LigPlan;
use App\MatchEngine\MatchGame;
use App\MatchEngine\Simulation;
use App\Models\PremierLigPlan;
use App\Models\Team;
use App\Models\TeamMatches;
use Illuminate\Http\Request;

class PremierLigController extends Controller
{
    public function index()
    {
        $ligPlan = TeamMatches::where('played', false)->get();
        return view('lig-plan')->with($ligPlan);
    }

    public function createPlan()
    {
        $plan = TeamMatches::all();
        if ($plan->count() > 0) {
            return false;
        }
        $teams = Team::all();
        $teamNames = $teams->pluck('id')->toArray();
        $premierLigWeeklyPlan = LigPlan::createPlan($teamNames);
        foreach ($premierLigWeeklyPlan as $week) {
            foreach ($week as $match) {
                TeamMatches::create([
                    'home_team_id' => $match['home_team_id'],
                    'away_team_id' => $match['away_team_id'],
                    'week'         => $match['week'],
                ]);
            }
        }
        return redirect()->route('match.index');
    }


    public function runMatch($week)
    {
        $matches = TeamMatches::where('week', $week)->get();
        foreach ($matches as $match) {
            $homeTeam = $match->homeTeam;
            $awayTeam = $match->awayTeam;
            $matchToRun = new MatchGame($homeTeam, $awayTeam);
            $result = $matchToRun->runGame();
            $match->played = true;
            $match->away_team_score = $result['scoreForHome'] ? : 0;
            $match->home_team_score = $result['scoreForAway'] ? : 0;
            $match->save();
            $homeTeam->updateTeamStatus($match->home_team_score, $match->away_team_score);
            $awayTeam->updateTeamStatus($match->away_team_score, $match->home_team_score,);
        }
        return redirect()->route('match.index');

    }

    public function getWeeksMatch($week = null)
    {
        if (!$week) {
            $matches = TeamMatches::all();
        } else {
            $matches = TeamMatches::where('week', $week)->get();
        }
        return view('match.index')->withMatches($matches);
    }
}
