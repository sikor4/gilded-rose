<?php

namespace App\GildedRose\Strategies\Item;

use App\GildedRose\Entities\Item;
use App\GildedRose\Strategies\Interfaces\UpdateItemStrategyInterface;

class AgedBrieStrategy implements UpdateItemStrategyInterface
{
    public function update(Item $item)
    {
            
        if ($item->getQuality() < 50) {
            $item->incrementQuality();
        }
        $item->setSellIn($item->getSellIn() - 1);

        if ($item->getSellIn() < 0 && $item->getQuality() < 50) {
            $item->incrementQuality();
        }   
        
        return;
    }

}