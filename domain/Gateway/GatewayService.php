<?php

namespace Domain\Gateway;

use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use GuzzleHttp\Client;

class GatewayService implements GatewayServiceInterface
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @inheritDoc
     */
    public function request(RequestMethod $method, string $url, array $options = []): ResponseData
    {
        try {
            $response = $this->client->request($method->value(), $url);
        } catch (\Exception $e) {
            throw new FailedToConnectException($e->getMessage());
        }

        return new ResponseData($response);
    }
}
