<?php

namespace App\GildedRose\Providers;

use App\GildedRose\Enums\ItemName;
use App\GildedRose\Services\StrategyRegistryService;
use App\GildedRose\Strategies\Item\AgedBrieStrategy;
use App\GildedRose\Strategies\Item\BackstagePassStrategy;
use App\GildedRose\Strategies\Item\DefaultStrategy;
use App\GildedRose\Strategies\Item\ElixirStrategy;
use App\GildedRose\Strategies\Item\SulfurasStrategy;

class AppServiceProvider
{
    protected StrategyRegistryService $registry;

    public function __construct(StrategyRegistryService $registry)
    {
        $this->registry = $registry;
    }

    public function register(): void
    {
        $this->registry->registerStrategy(ItemName::AGED_BRIE->value, AgedBrieStrategy::class);
        $this->registry->registerStrategy(ItemName::BACKSTAGE_PASS->value, BackstagePassStrategy::class);
        $this->registry->registerStrategy(ItemName::SULFURAS->value, SulfurasStrategy::class);
        $this->registry->registerStrategy(ItemName::ELIXIR->value, ElixirStrategy::class);
        $this->registry->registerStrategy('default', DefaultStrategy::class);
    }
}
