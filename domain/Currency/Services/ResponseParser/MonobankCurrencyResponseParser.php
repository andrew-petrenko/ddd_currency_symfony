<?php

namespace Domain\Currency\Services\ResponseParser;

use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Currency\Currency;

class MonobankCurrencyResponseParser extends AbstractCurrencyResponseParser implements CurrencyResponseParserInterface
{
    private const BANK_ISO_CODE_A_USD = 840;
    private const BANK_ISO_CODE_A_EUR = 978;
    private const BANK_ISO_CODE_A_RUR = 643;

    private const BANK_ISO_CODE_B_USD = 980;
    private const BANK_ISO_CODE_B_EUR = 980;
    private const BANK_ISO_CODE_B_RUR = 980;

    private const VALID_BANK_ISO_CODES = [
        self::BANK_ISO_CODE_A_USD => self::BANK_ISO_CODE_B_USD,
        self::BANK_ISO_CODE_A_EUR => self::BANK_ISO_CODE_B_EUR,
        self::BANK_ISO_CODE_A_RUR => self::BANK_ISO_CODE_B_RUR
    ];

    private const CURRENCY_CODE_LABELS = [
        self::BANK_ISO_CODE_A_USD => 'USD',
        self::BANK_ISO_CODE_A_EUR => 'EUR',
        self::BANK_ISO_CODE_A_RUR => 'RUR'
    ];

    protected static function makeCurrency(\stdClass $item): Currency
    {
        return new Currency(
            self::CURRENCY_CODE_LABELS[$item->currencyCodeA],
            new \DateTime(strtotime($item->date)),
            $item->rateBuy,
            $item->rateSell
        );
    }

    protected static function isValid(\stdClass $item): bool
    {
        return in_array($item->currencyCodeA, array_keys(self::VALID_BANK_ISO_CODES))
            && in_array($item->currencyCodeB, array_values(self::VALID_BANK_ISO_CODES));
    }
}
