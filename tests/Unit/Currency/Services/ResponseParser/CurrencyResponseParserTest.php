<?php

namespace App\Tests\Unit\Currency\Services\ResponseParser;

use Domain\Currency\Services\ResponseParser\AbstractCurrencyResponseParser;
use PHPUnit\Framework\TestCase;

class CurrencyResponseParserTest extends TestCase
{
    public function testCreation()
    {
        $parser = $this->createStub(AbstractCurrencyResponseParser::class);

        $this->assertInstanceOf(AbstractCurrencyResponseParser::class, $parser);
    }

    //@todo add tests of different parsing process with response data mocking
}
