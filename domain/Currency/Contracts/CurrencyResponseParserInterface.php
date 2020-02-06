<?php

namespace Domain\Currency\Contracts;

use Domain\Currency\CurrencyCollection;
use Domain\Gateway\ResponseData;

interface CurrencyResponseParserInterface
{
    public function parse(ResponseData $responseData): void;

    public function getCollection(): CurrencyCollection;
}
