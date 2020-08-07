<?php

namespace App\Tests\Unit\Currency\Enums;

use Domain\Currency\Enums\Bank;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    public function testMonoBank()
    {
        $bank = Bank::mono();

        $this->assertInstanceOf(Bank::class, $bank);
        $this->assertEquals('MONO', $bank->value());
    }

    public function testPrivatBank()
    {
        $bank = Bank::privat();

        $this->assertInstanceOf(Bank::class, $bank);
        $this->assertEquals('PRIVAT', $bank->value());
    }
}
