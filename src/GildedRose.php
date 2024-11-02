<?php

namespace App;

final class GildedRose
{
    public function updateQuality($item)
    {
        if ($item->name != ItemName::AGED_BRIE->value and $item->name != ItemName::BACKSTAGE_PASS->value) {
            if ($item->quality > 0) {
                if ($item->name != ItemName::SULFURAS->value) {
                    $item->quality = $item->quality - 1;
                } else {
                    $item->quality = 80;
                }
            }
        } else {
            if ($item->quality < 50) {
                $item->quality = $item->quality + 1;
                if ($item->name == ItemName::BACKSTAGE_PASS->value) {
                    if ($item->sell_in < 11) {
                        if ($item->quality < 50) {
                            $item->quality = $item->quality + 1;
                        }
                    }
                    if ($item->sell_in < 6) {
                        if ($item->quality < 50) {
                            $item->quality = $item->quality + 1;
                        }
                    }
                }
            }
        }

        if ($item->name != ItemName::SULFURAS->value) {
            $item->sell_in = $item->sell_in - 1;
        }

        if ($item->sell_in < 0) {
            if ($item->name != ItemName::AGED_BRIE->value) {
                if ($item->name != ItemName::BACKSTAGE_PASS->value) {
                    if ($item->quality > 0) {
                        if ($item->name != ItemName::SULFURAS->value) {
                            $item->quality = $item->quality - 1;
                        }
                    }
                } else {
                    $item->quality = $item->quality - $item->quality;
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                }
            }
        }
    }

}