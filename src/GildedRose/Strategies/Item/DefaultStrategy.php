<?php

namespace App\GildedRose\Strategies\Item;

use App\GildedRose\Entities\Item;
use App\GildedRose\Strategies\Interfaces\UpdateItemStrategyInterface;

class DefaultStrategy implements UpdateItemStrategyInterface
{
    public function update(Item $item): void
    {
        return;
    }

}