<?php

namespace Domain\Currency\Contracts;

use Domain\Currency\Exceptions\FailedToConnectToBankException;
use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\ResponseData;

interface CurrencyRequesterInterface
{
    public function __construct(GatewayServiceInterface $gateway);

    /**
     * @throws FailedToConnectToBankException
     */
    public function request(): ResponseData;
}
