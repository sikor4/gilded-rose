<?php

namespace App\BaselineTestsResults;

use App\GildedRose;
use App\Item;

class TestScenarioGenerator
{
    public function construct() {}

    public function generate()
    {
        $results = [];
        
        $sellIns = range(-11, 11);
        $qualities = range(-1, 81);
        $names = [
            'Aged Brie',
            'Backstage passes to a TAFKAL80ETC concert',
            'Sulfuras, Hand of Ragnaros',
            'Elixir of the Mongoose' 
        ];
        
        foreach ($names as $key => $name) {
            foreach ($sellIns as $sellIn) {
                foreach($qualities as $quality) {

                    $item = (new Item($name, $sellIn, $quality));
                    $gildedRose = (new GildedRose());
                    $gildedRose->updateQuality($item);

                    $results[] = [
                        'initial' => [
                            'name' => $name, 
                            'sellIn' => $sellIn, 
                            'quality' => $quality
                        ],
                        'result' => [
                            'sellIn' => $item->sell_in, 
                            'quality' => $item->quality
                        ]
                    ];

                }
            }
        }

        return $results;
    }
}