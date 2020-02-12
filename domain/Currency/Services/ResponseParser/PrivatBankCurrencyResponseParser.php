<?php

namespace Domain\Currency\Services\ResponseParser;

use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Currency\Currency;

class PrivatBankCurrencyResponseParser extends AbstractCurrencyResponseParser implements CurrencyResponseParserInterface
{
    const BANK_CODE_USD = 'USD';
    const BANK_CODE_EUR = 'EUR';
    const BANK_CODE_RUR = 'RUR';

    const VALID_BANK_CODES = [
        self::BANK_CODE_USD,
        self::BANK_CODE_EUR,
        self::BANK_CODE_RUR
    ];

    protected function makeCurrency(\stdClass $item): Currency
    {
        return new Currency(
            $item->ccy,
            new \DateTime(),
            $item->buy,
            $item->sale
        );
    }

    protected function validate(\stdClass $item): bool
    {
        if (in_array($item->ccy, self::VALID_BANK_CODES)) {
            return true;
        }

        return false;
    }
}
