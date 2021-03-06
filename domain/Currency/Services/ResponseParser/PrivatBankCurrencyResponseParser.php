<?php

namespace Domain\Currency\Services\ResponseParser;

use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Currency\Currency;

class PrivatBankCurrencyResponseParser extends AbstractCurrencyResponseParser implements CurrencyResponseParserInterface
{
    private const BANK_CODE_USD = 'USD';
    private const BANK_CODE_EUR = 'EUR';
    private const BANK_CODE_RUR = 'RUR';

    private const VALID_BANK_CODES = [
        self::BANK_CODE_USD,
        self::BANK_CODE_EUR,
        self::BANK_CODE_RUR
    ];

    protected static function makeCurrency(\stdClass $item): Currency
    {
        return new Currency(
            $item->ccy,
            new \DateTime(),
            $item->buy,
            $item->sale
        );
    }

    protected static function isValid(\stdClass $item): bool
    {
        return in_array($item->ccy, self::VALID_BANK_CODES);
    }
}
