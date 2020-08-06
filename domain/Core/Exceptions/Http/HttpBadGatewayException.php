<?php

namespace Domain\Core\Exceptions\Http;

class HttpBadGatewayException extends HttpException
{
    protected $message = 'Bad gateway';
    protected int $statusCode = 502;
}
