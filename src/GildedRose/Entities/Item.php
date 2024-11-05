<?php

namespace App\GildedRose\Entities;

use App\GildedRose\Enums\ItemName;

final class Item
{
    public function __construct(
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
        $this->quality = max(0, min($this->getMaxQuality(), $quality));
    }

    public function incrementQuality(): void
    {
        if ($this->quality < $this->getMaxQuality()) {
            $this->quality++;
        }
    }

    public function decrementQuality(): void
    {
        if ($this->quality > 0) {
            $this->quality--;
        }
    }

    private function getMaxQuality(): int
    {
        return $this->isLegendary() ? 80 : 50;
    }

    private function isLegendary(): bool
    {
        return in_array($this->name, [
            ItemName::SULFURAS->value

        ]);
    }

}
