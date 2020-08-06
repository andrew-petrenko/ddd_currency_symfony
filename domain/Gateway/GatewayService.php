<?php

namespace Domain\Gateway;

use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use GuzzleHttp\Client;

class GatewayService implements GatewayServiceInterface
{
    protected Client $client;
    protected ResponseData $responseData;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @inheritDoc
     */
    public function request(RequestMethod $method, string $url, array $options = []): GatewayServiceInterface
    {
        try {
            $response = $this->client->request($method->value(), $url);
        } catch (\Exception $e) {
            throw new FailedToConnectException($e->getMessage());
        }

        $this->responseData = new ResponseData($response);

        return $this;
    }

    public function getResponseData(): ResponseData
    {
        return $this->responseData;
    }
}
