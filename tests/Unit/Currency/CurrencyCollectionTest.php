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

        $this->assertEachInstanceOf(Currency::class, $collection);
    }

    public function testCollectionCanNotContainsInvalidInstances()
    {
        $this->expectException(\InvalidArgumentException::class);
        new CurrencyCollection($this->invalidInstances());
    }

    public function testCurrencyCanBeAddedToCollection()
    {
        $collection = new CurrencyCollection();
        $collection->add($this->createMock(Currency::class));

        $this->assertEachInstanceOf(Currency::class, $collection);
    }

    public function testCurrenciesCanBeObtainedFromCollection()
    {
        $collection = new CurrencyCollection($this->validInstances());
        $this->assertContainsOnly(Currency::class, $collection->getCollection());
    }

    protected function assertEachInstanceOf(string $class, CurrencyCollection $collection)
    {
        foreach ($collection->getCollection() as $item) {
            $this->assertInstanceOf($class, $item);
        }
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
