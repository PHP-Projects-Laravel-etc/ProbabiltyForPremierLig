<?php


namespace App\MatchEngine;


use App\Models\Team;
use App\Models\TeamMatches;

class Simulation
{

    protected function runSimulationForAllTeams($matches) {

    }


    public function runSimulationForAllProgram() {
        $matches = new TeamMatches();
        $remainingWeeks = $matches->getHighestWeek();
    }
}
