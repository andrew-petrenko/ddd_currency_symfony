<?php

namespace Domain\Core\Exceptions\Contracts;

interface DomainHttpExceptionInterface
{
    public function getStatusCode(): int;
}
