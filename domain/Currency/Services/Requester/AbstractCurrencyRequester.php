<?php

namespace Domain\Currency\Services\Requester;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Currency\Exceptions\FailedToConnectToBankException;
use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use Domain\Gateway\Exceptions\InvalidRequestMethodException;
use Domain\Gateway\GatewayService;
use Domain\Gateway\ResponseData;

abstract class AbstractCurrencyRequester implements CurrencyRequesterInterface
{
    /**
     * @var GatewayService
     */
    private $gateway;

    /**
     * @var string
     */
    protected static $method = 'GET';

    /**
     * @var string
     */
    protected static $url;

    /**
     * @throws InvalidRequestMethodException
     */
    public function __construct(GatewayServiceInterface $gateway)
    {
        $this->gateway = $gateway;
        $this->prepareConnection();
    }

    /**
     * @throws FailedToConnectToBankException
     */
    public function request(): ResponseData
    {
        try {
            $connection = $this->gateway->connect();
        } catch (FailedToConnectException $e) {
            throw new FailedToConnectToBankException();
        }

        return $connection->getResponseData();
    }

    /**
     * @throws InvalidRequestMethodException
     */
    protected function prepareConnection(): void
    {
        $this->gateway
            ->setMethod(static::$method)
            ->setUrl(static::$url);
    }
}
