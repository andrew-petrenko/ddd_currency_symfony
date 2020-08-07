<?php

namespace Domain\Currency\Services\Requester;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Currency\Exceptions\FailedToConnectToBankException;
use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use Domain\Gateway\RequestMethod;
use Domain\Gateway\ResponseData;

abstract class AbstractCurrencyRequester implements CurrencyRequesterInterface
{
    protected static RequestMethod $method;
    protected static string $url;

    private GatewayServiceInterface $gateway;

    public function __construct(GatewayServiceInterface $gateway)
    {
        $this->gateway = $gateway;
        self::$method = static::defaultRequestMethod();
    }

    /**
     * @inheritDoc
     */
    public function request(): ResponseData
    {
        try {
            $this->gateway->request(static::$method, static::$url);
        } catch (FailedToConnectException $e) {
            throw new FailedToConnectToBankException();
        }

        return $this->gateway->getResponseData();
    }

    protected static function defaultRequestMethod(): RequestMethod
    {
        return RequestMethod::get();
    }
}
