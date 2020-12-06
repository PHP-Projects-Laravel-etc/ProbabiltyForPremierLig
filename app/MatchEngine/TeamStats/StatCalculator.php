<?php


namespace App\MatchEngine\TeamStats;


abstract class StatCalculator
{


    public function calculate($point): int
    {
        return $this->weight() * $point;
    }

    abstract public function weight();

}
