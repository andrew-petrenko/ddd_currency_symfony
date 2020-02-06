<?php

namespace Domain\Currency;

class CurrencyCollection
{
    /**
     * @var Currency[]
     */
    private $currencies;

    public function __construct(Currency ...$currencies)
    {
        $this->currencies = $currencies;
    }

    public function add(Currency $currency): void
    {
        $this->currencies[] = $currency;
    }

    /**
     * @return Currency[]
     */
    public function getCollection(): array
    {
        return $this->currencies;
    }
}
