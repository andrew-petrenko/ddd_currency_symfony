<?php

namespace Domain\Currency\Services\Requester;

use Domain\Currency\Contracts\CurrencyRequesterInterface;

class PrivatBankCurrencyRequester extends AbstractCurrencyRequester implements CurrencyRequesterInterface
{
    protected static $url = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
}
