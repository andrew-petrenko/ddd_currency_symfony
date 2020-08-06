<?php

namespace Domain\Core\Exceptions\Http\ClientExceptions;

class HttpBadRequestException extends ClientException
{
    protected $message = 'Bad request';
    protected int $statusCode = 400;
}
