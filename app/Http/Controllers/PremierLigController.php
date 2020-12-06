<?php

namespace App\Http\Controllers;

use App\MatchEngine\LigPlan;
use App\MatchEngine\Match;
use App\Models\PremierLigPlan;
use App\Models\Team;
use App\Models\TeamMatches;
use Illuminate\Http\Request;

class PremierLigController extends Controller
{
    public function index() {
        $ligPlan = PremierLigPlan::all();
        return view('lig-plan')->with($ligPlan);
    }

    public function createPlan() {
        $teams = Team::all();
        $teamNames = $teams->pluck('id');
        $premierLigPlan = LigPlan::createPlan($teamNames);
        PremierLigPlan::insert($premierLigPlan);
    }


    public function runMatch(Request $request) {
        $week = $request->input('week');
        $matches = PremierLigPlan::where('math_week', $week)->get();
        foreach ($matches as $match) {
           $matchToRun = new Match($match->homeTeam, $match->awayTeam);
           $result = $matchToRun->runGame();
           TeamMatches::create(
               [
                   'home_team_id' => $match->homeTeam->id,
                   'away_team_id' => $match->homeTeam->id,
                   'home_team_score' => $result['scoreForHome'],
                   'away_team_score' => $result['scoreForAway'],
               ])
        }
    }
}
