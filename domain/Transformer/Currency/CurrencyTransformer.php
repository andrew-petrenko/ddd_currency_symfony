<?php

namespace Domain\Transformer\Currency;

use Domain\Currency\Currency;
use Domain\Transformer\AbstractTransformer;

class CurrencyTransformer extends AbstractTransformer
{
    /**
     * @param object $currency
     * @return array
     */
    public function transform(object $currency): array
    {
        /** @var Currency $currency */
        return [
            'name' => $currency->getName(),
            'date' => $currency->getDate()->format('Y-m-d'),
            'buy_price' => $currency->getBuyPrice(),
            'sell_price' => $currency->getSellPrice()
        ];
    }
}
