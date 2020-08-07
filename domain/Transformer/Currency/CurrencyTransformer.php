<?php

namespace Domain\Transformer\Currency;

use Domain\Currency\Currency;
use Domain\Transformer\AbstractTransformer;

class CurrencyTransformer extends AbstractTransformer
{
    /**
     * @param Currency|object $currency
     * @return array
     */
    public function transform(object $currency): array
    {
        return [
            'name' => $currency->getName(),
            'date' => $currency->getDate()->format('Y-m-d'),
            'buy_price' => $currency->getBuyPrice(),
            'sell_price' => $currency->getSellPrice()
        ];
    }
}
