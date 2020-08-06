<?php

namespace Domain\Core\Exceptions\Http\ClientExceptions;

use Domain\Core\Exceptions\Http\HttpException;

class ClientException extends HttpException
{
    protected int $statusCode = 400;
}
