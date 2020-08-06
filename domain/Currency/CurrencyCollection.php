<?php

namespace Domain\Currency;

class CurrencyCollection
{
    /**
     * @var Currency[]
     */
    private array $currencies;

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

    public function length(): int
    {
        return count($this->currencies);
    }

    /**
     * @return Currency[]
     */
    public function all(): array
    {
        return $this->currencies;
    }
}
