<?php

namespace Domain\Currency\Exceptions;

class FailedToConnectToBankException extends \Exception
{
    protected $message = 'Failed to connect to bank';
}
