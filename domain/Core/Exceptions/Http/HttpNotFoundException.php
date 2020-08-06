<?php

namespace Domain\Core\Exceptions\Http;

class HttpNotFoundException extends HttpException
{
    protected $message = 'Not found';
    protected int $statusCode = 404;
}
