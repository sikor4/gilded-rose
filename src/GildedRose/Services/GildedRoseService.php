<?php

namespace App\GildedRose\Services;

use App\GildedRose\Entities\Item;
use App\GildedRose\Enums\ItemName;
use App\GildedRose\Strategies\Item\AgedBrieStrategy;
use App\GildedRose\Strategies\Item\BackstagePassStrategy;
use App\GildedRose\Strategies\Item\DefaultStrategy;
use App\GildedRose\Strategies\Item\ElixirStrategy;
use App\GildedRose\Strategies\Item\SulfurasStrategy;

final class GildedRoseService
{
    public function updateQuality(Item $item)
    {   
        $strategy = $this->getStrategy($item->name);
        $strategy->update($item);
    }
    
    public function getStrategy(string $itemName)
    {
        return match ($itemName) {
            ItemName::SULFURAS->value => (new SulfurasStrategy()),
            ItemName::AGED_BRIE->value => (new AgedBrieStrategy()),
            ItemName::ELIXIR->value => (new ElixirStrategy()),
            ItemName::BACKSTAGE_PASS->value => (new BackstagePassStrategy()),

            default => (new DefaultStrategy())
        };
    }
        
}
