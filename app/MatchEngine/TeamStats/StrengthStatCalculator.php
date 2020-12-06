<?php


namespace App\MatchEngine\TeamStats;


class StrengthStatCalculator implements StatCalculatorInterface
{
    /**
     * @var StatCalculatorInterface
     */
    private $statCalculator;
    /**
     * @var int
     */
    private $point;

    public function __construct(StatCalculatorInterface $statCalculator, int $point)
    {
        $this->statCalculator = $statCalculator;
        $this->point = $point;
    }

    public function weight(): int
    {
        return 1;
    }

    public function result(): int
    {
        return ($this->weight() * $this->point) + $this->statCalculator->getResult();
    }
}
