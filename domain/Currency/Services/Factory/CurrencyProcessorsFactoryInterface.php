<?php

namespace Domain\Currency\Services\Factory;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Gateway\Contracts\GatewayServiceInterface;

interface CurrencyProcessorsFactoryInterface
{
    public function __construct(GatewayServiceInterface $gatewayService);

    public function getRequester(): CurrencyRequesterInterface;

    public function getResponseParser(): CurrencyResponseParserInterface;
}
