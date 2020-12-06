<?php


namespace App\MatchEngine\TeamStats;


class StrengthStatCalculator implements StatCalculatorInterface
{

    public function weight(): int
    {
        return 1;
    }
}
