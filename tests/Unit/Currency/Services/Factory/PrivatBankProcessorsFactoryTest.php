<?php

namespace App\Tests\Unit\Currency\Services\Factory;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Currency\Services\Factory\PrivatBankProcessorsFactory;
use Domain\Currency\Services\Requester\PrivatBankCurrencyRequester;
use Domain\Currency\Services\ResponseParser\PrivatBankCurrencyResponseParser;
use Domain\Gateway\Contracts\GatewayServiceInterface;
use PHPUnit\Framework\TestCase;

class PrivatBankProcessorsFactoryTest extends TestCase
{
    public function testCreation()
    {
        $factory = new PrivatBankProcessorsFactory($this->createMock(GatewayServiceInterface::class));

        $this->assertInstanceOf(PrivatBankProcessorsFactory::class, $factory);
    }

    public function testGetRequester()
    {
        $factory = new PrivatBankProcessorsFactory($this->createMock(GatewayServiceInterface::class));

        $this->assertInstanceOf(PrivatBankCurrencyRequester::class, $factory->getRequester());
        $this->assertInstanceOf(CurrencyRequesterInterface::class, $factory->getRequester());
    }

    public function testGetResponseParser()
    {
        $factory = new PrivatBankProcessorsFactory($this->createMock(GatewayServiceInterface::class));

        $this->assertInstanceOf(PrivatBankCurrencyResponseParser::class, $factory->getResponseParser());
        $this->assertInstanceOf(CurrencyRequesterInterface::class, $factory->getRequester());
    }
}
