<?php

namespace App\Tests\Unit\Currency;

use Domain\Currency\Currency;
use Domain\Currency\CurrencyCollection;
use PHPUnit\Framework\TestCase;

class CurrencyCollectionTest extends TestCase
{
    public function testCreation()
    {
        $collection = new CurrencyCollection();

        $this->assertInstanceOf(CurrencyCollection::class, $collection);
    }

    public function testCollectionCanReturnArrayOfInstances()
    {
        $currencies = [
            $this->createMock(Currency::class),
            $this->createMock(Currency::class),
            $this->createMock(Currency::class)
        ];

        $collection = new CurrencyCollection($currencies);

        $this->assertEquals($currencies, $collection->all());
    }

    public function testCollectionCanContainsArrayOfCurrencies()
    {
        $collection = new CurrencyCollection([
            $this->createMock(Currency::class),
            $this->createMock(Currency::class),
            $this->createMock(Currency::class)
        ]);

        $this->assertContainsOnlyInstancesOf(Currency::class, $collection->all());
    }

    public function testThrowsExceptionOnInvalidClassOnCreation()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid object type passed to CurrencyCollection');

        new CurrencyCollection([
            $this->createMock(Currency::class),
            $this->createMock(Currency::class),
            $this->createMock(\stdClass::class)
        ]);
    }

    public function testLength()
    {
        $collection = new CurrencyCollection([
            $this->createMock(Currency::class),
            $this->createMock(Currency::class),
            $this->createMock(Currency::class)
        ]);

        $this->assertEquals(3, $collection->length());
    }


    public function testAddToCollection()
    {
        $collection = new CurrencyCollection([
            $this->createMock(Currency::class),
            $this->createMock(Currency::class),
            $this->createMock(Currency::class)
        ]);

        $this->assertEquals(3, $collection->length());

        $collection->add($this->createMock(Currency::class));

        $this->assertEquals(4, $collection->length());
    }
}
