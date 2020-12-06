<?php


namespace App\MatchEngine\TeamStats;


interface StatCalculatorInterface
{
public function weight(): int;
public function result(): int;
}
