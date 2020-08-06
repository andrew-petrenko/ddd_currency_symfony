<?php

namespace Domain\Currency\Exceptions;

use Domain\Gateway\Exceptions\FailedToConnectException;

class FailedToConnectToBankException extends FailedToConnectException
{
    protected $message = 'Failed to connect to bank';
}
