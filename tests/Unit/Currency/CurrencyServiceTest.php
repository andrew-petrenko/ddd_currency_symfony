<?php

namespace App\Tests\Unit\Currency\Service;

use Domain\Currency\CurrencyCollection;
use Domain\Currency\Services\CurrencyService;
use PHPUnit\Framework\TestCase;

class CurrencyServiceTest extends TestCase
{
    public function testServiceReturnsCurrencyCollection()
    {
        $service = $this->createMock(CurrencyService::class);
        $collection = $service->getCurrencyFromBank();

        $this->assertInstanceOf(CurrencyCollection::class, $collection);
    }
}
