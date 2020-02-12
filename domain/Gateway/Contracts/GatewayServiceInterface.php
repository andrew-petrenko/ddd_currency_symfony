<?php

namespace Domain\Gateway\Contracts;

use Domain\Gateway\ResponseData;

interface GatewayServiceInterface
{
    public function setMethod(string $requestMethod): self;

    public function setUrl(string $url): self;

    public function connect(): self;

    public function getResponseData(): ResponseData;
}
