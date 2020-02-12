<?php

namespace App\Tests\Unit\Currency\Collection;

use Domain\Currency\Currency;
use Domain\Currency\CurrencyCollection;
use PHPUnit\Framework\TestCase;

class CurrencyCollectionTest extends TestCase
{
    public function testCollectionCanContainsValidInstances()
    {
        $collection = new CurrencyCollection($this->validInstances());

        $this->assertContainsOnly(Currency::class, $collection->getCollection());
    }

    public function testCollectionCanNotContainsInvalidInstances()
    {
        $this->expectException(\InvalidArgumentException::class);
        $collection = new CurrencyCollection($this->invalidInstances());
        $this->assertEmpty($collection->getCollection());
    }

    public function testCurrencyCanBeAddedToCollection()
    {
        $collection = new CurrencyCollection();
        $collection->add($this->createMock(Currency::class));

        $this->assertContainsOnly(Currency::class, $collection->getCollection());
    }

    public function testCurrenciesCanBeObtainedFromCollection()
    {
        $collection = new CurrencyCollection($this->validInstances());
        $this->assertContainsOnly(Currency::class, $collection->getCollection());
    }

    protected function validInstances(): array
    {
        return [$this->createMock(Currency::class)];
    }

    protected function invalidInstances(): array
    {
        return [$this->createMock(\stdClass::class)];
    }
}
