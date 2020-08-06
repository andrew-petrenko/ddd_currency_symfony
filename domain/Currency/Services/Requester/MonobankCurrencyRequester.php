<?php

namespace Domain\Currency\Services\Requester;

use Domain\Currency\Contracts\CurrencyRequesterInterface;

class MonobankCurrencyRequester extends AbstractCurrencyRequester implements CurrencyRequesterInterface
{
    protected static string $url = 'https://api.monobank.ua/bank/currency';
}
