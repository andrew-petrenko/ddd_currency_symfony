<?php

namespace Domain\Currency\Services\Factory;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Currency\Services\Requester\MonobankCurrencyRequester;
use Domain\Currency\Services\ResponseParser\MonobankCurrencyResponseParser;
use Domain\Gateway\Contracts\GatewayServiceInterface;

class MonobankProcessorsFactory implements CurrencyProcessorsFactoryInterface
{
    private GatewayServiceInterface $gatewayService;

    public function __construct(GatewayServiceInterface $gatewayService)
    {
        $this->gatewayService = $gatewayService;
    }

    public function getRequester(): CurrencyRequesterInterface
    {
        return new MonobankCurrencyRequester($this->gatewayService);
    }

    public function getResponseParser(): CurrencyResponseParserInterface
    {
        return new MonobankCurrencyResponseParser();
    }
}
