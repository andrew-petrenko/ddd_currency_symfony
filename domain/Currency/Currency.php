<?php

namespace Domain\Currency;

class Currency
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var float
     */
    private $sellPrice;

    /**
     * @var float
     */
    private $buyPrice;

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
