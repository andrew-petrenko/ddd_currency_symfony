<?php

namespace Domain\Currency;

class Currency
{
    private string $name;
    private \DateTime $date;
    private float $sellPrice;
    private float $buyPrice;

    public function __construct(string $name, \DateTime $date, float $buyPrice, float $sellPrice)
    {
        $this->name = $name;
        $this->date = $date;
        $this->buyPrice = $buyPrice;
        $this->sellPrice = $sellPrice;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getBuyPrice(): float
    {
        return $this->buyPrice;
    }

    public function getSellPrice(): float
    {
        return $this->sellPrice;
    }
}
