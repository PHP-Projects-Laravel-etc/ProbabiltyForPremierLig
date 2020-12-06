<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function runFactory() {
        Team::factory()->create(['name' =>'Chealsea']);
        Team::factory()->create(['name' =>'Liverpool']);
        Team::factory()->create(['name' =>'Arsenal']);
        Team::factory()->create(['name' =>'Manchester City']);
    }


    public function index() {
        $teams = Team::all();
        return view('teams.index')->withTeams($teams);
    }

    public function store(Request $request) {
        $team = new Team();
        $team->name = $request->input('name');
        $team->overall_strength = $request->input('overallStrength');
        $team->overall_agility = $request->input('agility');
        $team->overall_intelligence = $request->input('overallIntelligence');
        return view('team.index');
    }
}
