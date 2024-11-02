<?php

namespace App\GildedRose\Entities;

final class Item
{
    function __construct(
        public readonly string $name,
        private int $sellIn,
        private int $quality 
    ) {}

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }


    public function setSellIn(int $sellIn): void
    {
        $this->sellIn = $sellIn;
    }

    public function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }

    public function incrementQuality(): void
    {
        $this->quality++;
    }

    public function decrementQuality(): void
    {
        $this->quality--;
    }


    
    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}