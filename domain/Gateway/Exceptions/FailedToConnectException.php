<?php

namespace Domain\Gateway\Exceptions;

use Domain\Core\Exceptions\Http\ServerExceptions\HttpBadGatewayException;

class FailedToConnectException extends HttpBadGatewayException
{
    protected $message = 'Failed to connect';
}
