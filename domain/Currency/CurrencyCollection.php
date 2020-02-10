<?php

namespace Domain\Currency;

class CurrencyCollection
{
    /**
     * @var Currency[]
     */
    private $currencies;

    /**
     * @param Currency[] $currencies
     */
    public function __construct(array $currencies = [])
    {
        foreach ($currencies as $currency) {
            if (!$currency instanceof Currency) {
                throw new \InvalidArgumentException('Invalid object type passed to CurrencyCollection');
            }
        }

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
