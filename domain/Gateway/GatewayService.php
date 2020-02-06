<?php

namespace Domain\Gateway;

use Domain\Gateway\Exceptions\FailedToConnectException;
use Domain\Gateway\Exceptions\InvalidRequestMethodException;
use GuzzleHttp\Client;

class GatewayService
{
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

    public function __construct(string $requestMethod, string $url)
    {
        if (!in_array(strtoupper($requestMethod), static::$validMethods)) {
            throw new InvalidRequestMethodException();
        }

        $this->requestMethod = strtoupper($requestMethod);
        $this->url = $url;
    }

    /**
     * @throws FailedToConnectException
     */
    public function connect(): self
    {
        try {
            $response = (new Client())->request($this->requestMethod, $this->url);
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
