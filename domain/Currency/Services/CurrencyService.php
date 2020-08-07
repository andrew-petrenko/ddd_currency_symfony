<?php

namespace Domain\Currency\Services;

use Domain\Currency\Contracts\CurrencyServiceInterface;
use Domain\Currency\CurrencyCollection;
use Domain\Currency\Enums\Bank;
use Domain\Currency\Exceptions\UnknownBankException;
use Domain\Currency\Services\Factory\CurrencyProcessorsFactoryInterface;
use Domain\Currency\Services\Factory\MonobankProcessorsFactory;
use Domain\Currency\Services\Factory\PrivatBankProcessorsFactory;
use Domain\Gateway\Contracts\GatewayServiceInterface;

class CurrencyService implements CurrencyServiceInterface
{
    private GatewayServiceInterface $gatewayService;

    public function __construct(GatewayServiceInterface $gatewayService)
    {
        $this->gatewayService = $gatewayService;
    }

    /**
     * @inheritDoc
     * @throws UnknownBankException
     */
    public function getCurrencyFromBank(Bank $bank): CurrencyCollection
    {
        $factory = $this->getFactory($bank);

        $responseData = $factory->getRequester()->request();
        $responseParser = $factory->getResponseParser();
        $responseParser->parse($responseData);

        return $responseParser->getParsedCollection();
    }

    /**
     * @throws UnknownBankException
     */
    protected function getFactory(Bank $bank): CurrencyProcessorsFactoryInterface
    {
        switch ($bank) {
            case Bank::mono():
                return new MonobankProcessorsFactory($this->gatewayService);

            case Bank::privat():
                return new PrivatBankProcessorsFactory($this->gatewayService);

            default:
                throw new UnknownBankException();
        }
    }
}
