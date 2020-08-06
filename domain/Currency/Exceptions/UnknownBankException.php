<?php

namespace Domain\Currency\Exceptions;

use Domain\Core\Exceptions\Http\ClientExceptions\HttpBadRequestException;

class UnknownBankException extends HttpBadRequestException
{
    protected $message = 'Requested information from unknown bank';
}
