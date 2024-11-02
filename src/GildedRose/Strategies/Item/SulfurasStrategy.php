<?php

namespace App\GildedRose\Strategies\Item;

use App\GildedRose\Entities\Item;
use App\GildedRose\Enums\ItemName;
use App\interfaces\UpdateStrategyInterface;

class SulfurasStrategy implements UpdateStrategyInterface
{
    public function update(Item $item)
    {
        if ($item->quality > 0 && $item->name === ItemName::SULFURAS->value) {
            $item->quality = 80;
        }
        if ($item->name === ItemName::SULFURAS->value) {
            return;
        }
    
    }

}