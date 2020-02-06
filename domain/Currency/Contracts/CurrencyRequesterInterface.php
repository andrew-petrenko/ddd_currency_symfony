<?php

namespace Domain\Currency\Contracts;

use Domain\Gateway\ResponseData;

interface CurrencyRequesterInterface
{
    public function request(): ResponseData;
}
