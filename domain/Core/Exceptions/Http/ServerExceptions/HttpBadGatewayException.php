<?php

namespace Domain\Core\Exceptions\Http\ServerExceptions;

class HttpBadGatewayException extends ServerException
{
    protected $message = 'Bad gateway';
    protected int $statusCode = 502;
}
