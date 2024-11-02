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



        
        if ($item->name !== ItemName::AGED_BRIE->value && $item->name !== ItemName::BACKSTAGE_PASS->value) {
            if ($item->quality > 0) {
                if ($item->name !== ItemName::SULFURAS->value) {
                    $item->quality--;
                } 
            }
        } else {
            if ($item->quality < 50) {
                $item->quality++;
                if ($item->name === ItemName::BACKSTAGE_PASS->value) {
                    if ($item->sell_in < 11) {
                        if ($item->quality < 50) {
                            $item->quality++;
                        }
                    }
                    if ($item->sell_in < 6) {
                        if ($item->quality < 50) {
                            $item->quality++;
                        }
                    }
                }
            }
        }

        if ($item->name !== ItemName::SULFURAS->value) {
            $item->sell_in--;
        }

        if ($item->sell_in < 0) {
            if ($item->name !== ItemName::AGED_BRIE->value) {
                if ($item->name !== ItemName::BACKSTAGE_PASS->value) {
                    if ($item->quality > 0) {
                        if ($item->name !== ItemName::SULFURAS->value) {
                            $item->quality--;
                        }
                    }
                } else {
                    $item->quality = 0;
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality++;
                }
            }
        }
    }

}