<?php

namespace App\Tests\Unit\Currency;

use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Currency\CurrencyCollection;
use Domain\Gateway\ResponseData;
use PHPUnit\Framework\TestCase;

class CurrencyResponseParserTest extends TestCase
{
    public function testParserReturnsParsedCollectionAfterParsing()
    {
        $parser = $this->createMock(CurrencyResponseParserInterface::class);
        $responseData = $this->createMock(ResponseData::class);

        $parser->parse($responseData);

        $this->assertInstanceOf(CurrencyCollection::class, $parser->getParsedCollection());
    }
}
