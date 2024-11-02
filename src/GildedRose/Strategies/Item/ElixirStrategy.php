<?php

namespace App\GildedRose\Strategies\Item;

use App\GildedRose\Entities\Item;
use App\GildedRose\Enums\ItemName;
use App\GildedRose\Strategies\Interfaces\UpdateItemStrategyInterface;

class ElixirStrategy implements UpdateItemStrategyInterface
{
    public function update(Item $item)
    {
        if ($item->getQuality() > 0) {
            $item->decrementQuality();
        }
        $item->setSellIn($item->getSellIn() - 1);

        if ($item->getSellIn() < 0) {
            if ($item->name === ItemName::ELIXIR->value && $item->getQuality() > 0) {
                $item->decrementQuality();
            }
        }
        return;
    }

}