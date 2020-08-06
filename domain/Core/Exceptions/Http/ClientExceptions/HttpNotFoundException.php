<?php

namespace Domain\Core\Exceptions\Http\ClientExceptions;

class HttpNotFoundException extends ClientException
{
    protected $message = 'Not found';
    protected int $statusCode = 404;
}
