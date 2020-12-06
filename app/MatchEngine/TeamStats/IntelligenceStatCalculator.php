<?php


namespace App\MatchEngine\TeamStats;


class IntelligenceStatCalculator extends StatCalculator implements StatCalculatorInterface
{
    /**
     * @var StatCalculatorInterface
     */
    private $statCalculator;
    private $point;

    public function __construct(StatCalculatorInterface $statCalculator, $point)
    {
        $this->statCalculator = $statCalculator;
        $this->point = $point;

    }
    public function weight(): int
    {
        return 3;
    }

    public function result(): int
    {
        return $this->weight() + $this->statCalculator->weight();
    }
}
