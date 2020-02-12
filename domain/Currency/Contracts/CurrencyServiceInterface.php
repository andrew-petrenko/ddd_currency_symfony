<?php

namespace Domain\Currency\Contracts;

use Domain\Currency\CurrencyCollection;

interface CurrencyServiceInterface
{
    public function getCurrencyFromBank(): CurrencyCollection;
}
