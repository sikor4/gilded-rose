<?php

namespace App\GildedRose\Strategies\Item;

use App\GildedRose\Entities\Item;
use App\GildedRose\Strategies\Interfaces\UpdateItemStrategyInterface;

class SulfurasStrategy implements UpdateItemStrategyInterface
{
    public function update(Item $item): void
    {
        if ($item->getQuality() > 0) {
            $item->setQuality(80);
        }

        return;
    }

}