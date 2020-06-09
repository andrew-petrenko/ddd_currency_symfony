<?php

namespace Domain\Currency\Services\Requester;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Currency\Exceptions\FailedToConnectToBankException;
use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use Domain\Gateway\GatewayService;
use Domain\Gateway\RequestMethod;
use Domain\Gateway\ResponseData;

abstract class AbstractCurrencyRequester implements CurrencyRequesterInterface
{
    /**
     * @var GatewayService
     */
    private $gateway;

    /**
     * @var RequestMethod
     */
    protected static $method;

    /**
     * @var string
     */
    protected static $url;

    public function __construct(GatewayServiceInterface $gateway)
    {
        self::$method = RequestMethod::get();

        $this->gateway = $gateway;
        $this->prepareConnection();
    }

    /**
     * @throws FailedToConnectToBankException
     */
    public function request(): ResponseData
    {
        try {
            $this->gateway->connect();
        } catch (FailedToConnectException $e) {
            throw new FailedToConnectToBankException();
        }

        return $this->gateway->getResponseData();
    }

    protected function prepareConnection(): void
    {
        $this->gateway
            ->setMethod(static::$method)
            ->setUrl(static::$url);
    }
}
