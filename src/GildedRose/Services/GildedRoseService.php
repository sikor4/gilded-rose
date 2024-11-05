<?php

namespace App\GildedRose\Services;

use App\GildedRose\Entities\Item;

final class GildedRoseService
{
    private StrategyRegistryService $strategyRegistry;

    public function __construct(StrategyRegistryService $strategyRegistry)
    {
        $this->strategyRegistry = $strategyRegistry;
    }

    public function updateQuality(Item $item)
    {
        $strategy = $this->strategyRegistry->getStrategy($item->name);

        $strategy->update($item);
    }
}
