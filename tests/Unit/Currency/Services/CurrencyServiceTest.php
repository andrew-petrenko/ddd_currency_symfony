<?php

namespace App\Tests\Unit\Currency\Services;

use Domain\Currency\CurrencyCollection;
use Domain\Currency\Enums\Bank;
use Domain\Currency\Exceptions\UnknownBankException;
use Domain\Currency\Services\CurrencyService;
use Domain\Gateway\Contracts\GatewayServiceInterface;
use PHPUnit\Framework\TestCase;

class CurrencyServiceTest extends TestCase
{
    public function testCreation()
    {
        $currencyService = new CurrencyService($this->createMock(GatewayServiceInterface::class));

        $this->assertInstanceOf(CurrencyService::class, $currencyService);
    }

    public function testThrowsOnRequestingFromUnknownBank()
    {
        $currencyService = new CurrencyService($this->createMock(GatewayServiceInterface::class));
        $unknownBank = $this->createMock(Bank::class);

        $this->expectException(UnknownBankException::class);
        $this->expectExceptionMessage('Requested information from unknown bank');

        $currencyService->getCurrencyFromBank($unknownBank);
    }

    public function testGetCurrencyFromBank()
    {
        $currencyService = new CurrencyService($this->createMock(GatewayServiceInterface::class));
        $currencies = $currencyService->getCurrencyFromBank(Bank::privat());

        $this->assertInstanceOf(CurrencyCollection::class, $currencies);
    }
}
