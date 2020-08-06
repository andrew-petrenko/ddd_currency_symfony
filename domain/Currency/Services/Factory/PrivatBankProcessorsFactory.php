<?php

namespace Domain\Currency\Services\Factory;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Currency\Services\Requester\PrivatBankCurrencyRequester;
use Domain\Currency\Services\ResponseParser\PrivatBankCurrencyResponseParser;
use Domain\Gateway\Contracts\GatewayServiceInterface;

class PrivatBankProcessorsFactory implements CurrencyProcessorsFactoryInterface
{
    private GatewayServiceInterface $gatewayService;

    public function __construct(GatewayServiceInterface $gatewayService)
    {
        $this->gatewayService = $gatewayService;
    }

    public function getRequester(): CurrencyRequesterInterface
    {
        return new PrivatBankCurrencyRequester($this->gatewayService);
    }

    public function getResponseParser(): CurrencyResponseParserInterface
    {
        return new PrivatBankCurrencyResponseParser();
    }
}
