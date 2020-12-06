<?php

namespace App\Http\Controllers;

use App\MatchEngine\LigPlan;
use App\Models\PremierLigPlan;
use App\Models\Team;

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
}
