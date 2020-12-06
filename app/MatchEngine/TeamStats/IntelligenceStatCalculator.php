<?php


namespace App\MatchEngine\TeamStats;


class IntelligenceStatCalculator extends StatCalculator implements StatCalculatorInterface
{

    public function weight(): int
    {
        return 3;
    }
}
