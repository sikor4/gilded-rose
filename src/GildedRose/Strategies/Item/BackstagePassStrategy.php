<?php

namespace App\GildedRose\Strategies\Item;

use App\GildedRose\Entities\Item;
use App\GildedRose\Enums\ItemName;
use App\GildedRose\Strategies\Interfaces\UpdateItemStrategyInterface;

class BackstagePassStrategy implements UpdateItemStrategyInterface
{
    public function update(Item $item)
    {
        if ($item->name === ItemName::BACKSTAGE_PASS->value) {
            if ($item->getQuality() < 50) {
                $item->incrementQuality();
                
                if ($item->getSellIn() < 11 && $item->getQuality() < 50) {
                    $item->incrementQuality();
                }
                if ($item->getSellIn() < 6 && $item->getQuality() < 50) {
                    $item->incrementQuality();
                }
            }

        $item->setSellIn($item->getSellIn() - 1);
            
            if ($item->getSellIn() < 0 && $item->name === ItemName::BACKSTAGE_PASS->value) {
                $item->setQuality(0);
            }
        
            return;
        }
    }
}