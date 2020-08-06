<?php

namespace Domain\Gateway\Contracts;

use Domain\Gateway\Exceptions\FailedToConnectException;
use Domain\Gateway\RequestMethod;
use Domain\Gateway\ResponseData;

interface GatewayServiceInterface
{
    /**
     * @throws FailedToConnectException
     */
    public function request(RequestMethod $method, string $url, array $options = []): self;

    public function getResponseData(): ResponseData;
}
