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

    //
    public function deprecated($item) {
        // if ($item->getQuality() > 0 && $item->name === ItemName::SULFURAS->value) {
        //     $item->setQuality(80);
        // }
        // if ($item->name === ItemName::SULFURAS->value) {
        //     return;
        // }


        
            

        if ($item->name === ItemName::BACKSTAGE_PASS->value) {
            if ($item->getQuality() < 50) {
                $item->increaseQuality();
                
                if ($item->sell_in < 11 && $item->getQuality() < 50) {
                    $item->increaseQuality();
                }
                if ($item->sell_in < 6 && $item->getQuality() < 50) {
                    $item->decreaseQuality();
                }
            }

            $item->sell_in--;
            
            if ($item->sell_in < 0 && $item->name === ItemName::BACKSTAGE_PASS->value) {
                $item->setQuality(0);
            }
        
            return;
        }    
        
    }
}
