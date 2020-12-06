<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {
        $teams = Team::all();
        return view('team.index')->with($teams);
    }

    public function store(Request $request) {
        $team = new Team();
        $team->name = $request->name;
        $team->overall_strength = $request->overallStrength;
        $team->overall_agility = $request->agility;
        $team->overall_intelligence = $request->overallIntelligence;
        return view('team.index');
    }
}
