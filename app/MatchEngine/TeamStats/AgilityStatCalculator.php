<?php


namespace App\MatchEngine\TeamStats;


class AgilityStatCalculator implements StatCalculatorInterface
{
    private $point;

    public function weight(): int
    {
        return 7;
    }

}
