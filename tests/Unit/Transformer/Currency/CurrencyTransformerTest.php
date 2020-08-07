<?php

namespace App\Tests\Unit\Transformer\Currency;

use Domain\Currency\Currency;
use Domain\Transformer\Currency\CurrencyTransformer;
use PHPUnit\Framework\TestCase;

class CurrencyTransformerTest extends TestCase
{
    public function testTransform()
    {
        $currency = new Currency('USD', new \DateTime(), 27.15, 27.30);
        $transformer = new CurrencyTransformer();
        $transformedCurrency = $transformer->transform($currency);

        $this->assertIsArray($transformedCurrency);

        $this->assertArrayHasKey('name', $transformedCurrency);
        $this->assertEquals('USD', $transformedCurrency['name']);

        $this->assertArrayHasKey('date', $transformedCurrency);
        $this->assertEquals((new \DateTime())->format('Y-m-d'), $transformedCurrency['date']);

        $this->assertArrayHasKey('buy_price', $transformedCurrency);
        $this->assertEquals(27.15, $transformedCurrency['buy_price']);

        $this->assertArrayHasKey('sell_price', $transformedCurrency);
        $this->assertEquals(27.30, $transformedCurrency['sell_price']);
    }
}
