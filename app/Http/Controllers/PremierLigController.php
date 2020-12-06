<?php

namespace App\Http\Controllers;

use App\MatchEngine\LigPlan;
use App\MatchEngine\MatchGame;
use App\Models\PremierLigPlan;
use App\Models\Team;
use App\Models\TeamMatches;
use Illuminate\Http\Request;

class PremierLigController extends Controller
{
    public function index()
    {
        $ligPlan = TeamMatches::where('played',false)->get();
        return view('lig-plan')->with($ligPlan);
    }

    public function createPlan()
    {
        $teams = Team::all();
        $teamNames = $teams->pluck('id');
        $premierLigPlan = LigPlan::createPlan($teamNames);
        TeamMatches::insert($premierLigPlan);
    }


    public function runMatch(Request $request)
    {
//        $week = $request->input('week');
        $week = 1;
        $matches = TeamMatches::where('week', $week)->get();
        foreach ($matches as $match) {
            $homeTeam = $match->homeTeam;
            $awayTeam = $match->homeTeam;
            $matchToRun = new MatchGame($homeTeam, $awayTeam);
            $result = $matchToRun->runGame();
            $match->away_team_score = $result['scoreForHome'];
            $match->home_team_score = $result['scoreForAway'];

            if(!$homeTeam instanceof Team) {
                throw new \Exception();
            }

            if(!$awayTeam instanceof Team) {
                throw new \Exception();
            }
            $homeTeam->incrementPlayed();
            $homeTeam->updateStatusOfGame($match->home_team_score, $match->away_team_score);
            $homeTeam->updateGoals($match->home_team_score, $match->away_team_score);
            $homeTeam->updateTeamStatus($match->home_team_score, $match->away_team_score);
        }
    }
}
