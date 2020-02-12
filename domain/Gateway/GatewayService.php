<?php

namespace Domain\Gateway;

use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use Domain\Gateway\Exceptions\InvalidRequestMethodException;
use GuzzleHttp\Client;

class GatewayService implements GatewayServiceInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $requestMethod;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var array
     */
    protected static $validMethods = [
        'GET',
        'POST',
        'PUT',
        'PATCH'
    ];

    /**
     * @var ResponseData
     */
    protected $responseData;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws InvalidRequestMethodException
     */
    public function setMethod(string $requestMethod): GatewayServiceInterface
    {
        $this->validateMethod($requestMethod);
        $this->requestMethod = strtoupper($requestMethod);

        return $this;
    }

    public function setUrl(string $url): GatewayServiceInterface
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @throws FailedToConnectException
     */
    public function connect(): GatewayServiceInterface
    {
        try {
            $response = $this->client->request($this->requestMethod, $this->url);
        } catch (\Exception $e) {
            throw new FailedToConnectException();
        }

        $this->responseData = new ResponseData($response);

        return $this;
    }

    public function getResponseData(): ResponseData
    {
        return $this->responseData;
    }

    /**
     * @throws InvalidRequestMethodException
     */
    protected function validateMethod(string $requestMethod)
    {
        if (!in_array(strtoupper($requestMethod), static::$validMethods)) {
            throw new InvalidRequestMethodException();
        }
    }
}
