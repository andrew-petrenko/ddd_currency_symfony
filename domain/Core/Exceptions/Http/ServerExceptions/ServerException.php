<?php

namespace Domain\Core\Exceptions\Http\ServerExceptions;

use Domain\Core\Exceptions\Http\HttpException;

class ServerException extends HttpException
{
    protected int $statusCode = 500;
}
