<?php

namespace Domain\Gateway;

use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use GuzzleHttp\Client;

class GatewayService implements GatewayServiceInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var RequestMethod
     */
    protected $requestMethod;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var ResponseData
     */
    protected $responseData;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function setMethod(RequestMethod $requestMethod): GatewayServiceInterface
    {
        $this->requestMethod = $requestMethod;

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
            $response = $this->client->request($this->requestMethod->value(), $this->url);
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
}
