<?php

namespace App\GildedRose\Strategies\Interfaces;

use App\GildedRose\Entities\Item;

interface UpdateItemStrategyInterface 
{
    public function update(Item $item): void;
}