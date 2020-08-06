<?php

namespace Domain\Core\Exceptions\Http;

class HttpBadRequestException extends HttpException
{
    protected $message = 'Bad request';
    protected int $statusCode = 400;
}
