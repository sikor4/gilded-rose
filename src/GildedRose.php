<?php

namespace App;

final class GildedRose
{
    public function updateQuality($item)
    {   


        if ($item->quality > 0 && $item->name === ItemName::SULFURAS->value) {
            $item->quality = 80;
        }
        if ($item->name === ItemName::SULFURAS->value) {
            return;
        }


        if ($item->name === ItemName::ELIXIR->value) {
            if ($item->quality > 0) {
                    $item->quality--;
            }
            $item->sell_in--;
 
            if ($item->sell_in < 0) {
                if ($item->name === ItemName::ELIXIR->value && $item->quality > 0) {
                    $item->quality--;
                }
            }
            return;
        } 
    
        if ($item->name === ItemName::AGED_BRIE->value) {
            
            if ($item->quality < 50) {
                $item->quality++;
            }

            $item->sell_in--;
 
            if ($item->sell_in < 0 && $item->quality < 50) {
                $item->quality++;
            }   

            return;
        }
            

        if ($item->name === ItemName::BACKSTAGE_PASS->value) {
            if ($item->quality < 50) {
                $item->quality++;
                
                if ($item->sell_in < 11 && $item->quality < 50) {
                    $item->quality++;
                }
                if ($item->sell_in < 6 && $item->quality < 50) {
                    $item->quality++;
                }
            }

            $item->sell_in--;
            
            if ($item->sell_in < 0 && $item->name === ItemName::BACKSTAGE_PASS->value) {
                $item->quality = 0;
            }
        
            return;
        }    
        
    }
}
