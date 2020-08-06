<?php

namespace Domain\Currency\Contracts;

use Domain\Currency\CurrencyCollection;
use Domain\Currency\Enums\Bank;
use Domain\Currency\Exceptions\FailedToConnectToBankException;

interface CurrencyServiceInterface
{
    /**
     * @throws FailedToConnectToBankException
     */
    public function getCurrencyFromBank(Bank $bank): CurrencyCollection;
}
