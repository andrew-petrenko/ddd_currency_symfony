<?php

namespace Domain\Gateway\Exceptions;

class FailedToConnectException extends \Exception
{
    protected $message = 'Failed to connect';
}
