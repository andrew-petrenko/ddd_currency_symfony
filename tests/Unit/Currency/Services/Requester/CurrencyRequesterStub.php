<?php

namespace App\Tests\Unit\Currency\Services\Requester;

use Domain\Currency\Services\Requester\AbstractCurrencyRequester;

class CurrencyRequesterStub extends AbstractCurrencyRequester
{
    protected static string $url = 'http://google.com';
}
