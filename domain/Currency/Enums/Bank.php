<?php

namespace Domain\Currency\Enums;

use Domain\Utils\AbstractEnum;

/**
 * @method static Bank privat()
 * @method static Bank mono()
 */
class Bank extends AbstractEnum
{
    protected const PRIVAT = 'PRIVAT';
    protected const MONO = 'MONO';
}
