<?php

namespace Domain\Core\Exceptions\Http;

use Domain\Core\Exceptions\Contracts\DomainHttpExceptionInterface;

abstract class HttpException extends \Exception implements DomainHttpExceptionInterface
{
    protected int $statusCode;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
