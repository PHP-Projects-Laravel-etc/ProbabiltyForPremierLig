<?php


namespace App\MatchEngine\TeamStats;


class IntelligenceStatCalculator implements StatCalculatorInterface
{
    /**
     * @var StatCalculatorInterface
     */

    public function weight(): int
    {
        return 8;
    }
}
