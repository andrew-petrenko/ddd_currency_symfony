<?php

namespace App\Tests\Unit\Currency\Services\Factory;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Currency\Services\Factory\MonobankProcessorsFactory;
use Domain\Currency\Services\Requester\MonobankCurrencyRequester;
use Domain\Currency\Services\ResponseParser\MonobankCurrencyResponseParser;
use Domain\Gateway\Contracts\GatewayServiceInterface;
use PHPUnit\Framework\TestCase;

class MonobankProcessorsFactoryTest extends TestCase
{
    public function testCreation()
    {
        $factory = new MonobankProcessorsFactory($this->createMock(GatewayServiceInterface::class));

        $this->assertInstanceOf(MonobankProcessorsFactory::class, $factory);
    }

    public function testGetRequester()
    {
        $factory = new MonobankProcessorsFactory($this->createMock(GatewayServiceInterface::class));

        $this->assertInstanceOf(MonobankCurrencyRequester::class, $factory->getRequester());
        $this->assertInstanceOf(CurrencyRequesterInterface::class, $factory->getRequester());
    }

    public function testGetResponseParser()
    {
        $factory = new MonobankProcessorsFactory($this->createMock(GatewayServiceInterface::class));

        $this->assertInstanceOf(MonobankCurrencyResponseParser::class, $factory->getResponseParser());
        $this->assertInstanceOf(CurrencyRequesterInterface::class, $factory->getRequester());
    }
}
