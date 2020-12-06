<?php


namespace App\MatchEngine\TeamStats;


class AgilityStatCalculator extends StatCalculator implements StatCalculatorInterface
{
    private $point;

    public function __construct($point) {
        $this->point = $point;
    }

    public function weight(): int
    {
        return 2;
    }

    public function getResult(): int
    {
        return $this->point * $this->weight();
    }
}
