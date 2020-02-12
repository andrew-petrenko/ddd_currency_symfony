<?php

namespace Domain\Gateway\Exceptions;

class InvalidRequestMethodException extends \Exception
{
    protected $message = 'Invalid request method passed to function';
}
