<?php


namespace App\MatchEngine\TeamStats;


class AgilityStatCalculator implements StatCalculatorInterface
{


    public function weight(): int
    {
        return 2;
    }
}
