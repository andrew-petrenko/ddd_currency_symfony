<?php

namespace App\Tests\Unit\Currency;

use Domain\Currency\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testCreation()
    {
        $currency = new Currency('USD', new \DateTime(), 27.15, 27.30);

        $this->assertInstanceOf(Currency::class, $currency);
    }

    public function testGetName()
    {
        $currency = self::makeCurrency();

        $this->assertEquals('USD', $currency->getName());
    }

    public function testGetDate()
    {
        $date = new \DateTime();
        $currency = new Currency('USD', $date, 27.15, 27.30);

        $this->assertInstanceOf(\DateTime::class, $currency->getDate());
        $this->assertEquals($date->getTimestamp(), $currency->getDate()->getTimestamp());
    }

    public function testGetBuyPrice()
    {
        $currency = self::makeCurrency();

        $this->assertEquals(27.15, $currency->getBuyPrice());
    }

    public function testGetSellPrice()
    {
        $currency = self::makeCurrency();

        $this->assertEquals(27.30, $currency->getSellPrice());
    }

    private static function makeCurrency(): Currency
    {
        return new Currency('USD', new \DateTime(), 27.15, 27.30);
    }
}
