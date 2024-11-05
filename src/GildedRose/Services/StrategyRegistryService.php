<?php

namespace App\GildedRose\Services;

use App\GildedRose\Strategies\Interfaces\UpdateItemStrategyInterface;

class StrategyRegistryService
{
    private array $strategies = [];

    public function registerStrategy(string $itemName, string $strategyClass): void
    {
        $this->strategies[$itemName] = $strategyClass;
    }

    public function getStrategy(string $itemName): UpdateItemStrategyInterface
    {
        $strategyClass = $this->strategies[$itemName] ?? $this->strategies['default'];

        return new $strategyClass();
    }
}
