<?php

namespace App\Tests\Unit\Currency\Services\Requester;

use Domain\Currency\Exceptions\FailedToConnectToBankException;
use Domain\Currency\Services\Requester\AbstractCurrencyRequester;
use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use Domain\Gateway\ResponseData;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class CurrencyRequesterTest extends TestCase
{
    public function testCreation()
    {
        $requester = new CurrencyRequesterStub($this->createMock(GatewayServiceInterface::class));

        $this->assertInstanceOf(AbstractCurrencyRequester::class, $requester);
    }

    public function testRequestThrowsOnFailedConnection()
    {
        $gatewayService = $this->createMock(GatewayServiceInterface::class);
        $gatewayService
            ->method('request')
            ->willThrowException(new FailedToConnectException());

        $requester = new CurrencyRequesterStub($gatewayService);

        $this->expectException(FailedToConnectToBankException::class);
        $requester->request();
    }

    public function testRequestReturnsResponseDataAfterSuccessfulRequest()
    {
        $client = $this->createMock(GatewayServiceInterface::class);
        $client
            ->method('request')
            ->willReturn(new ResponseData($this->createMock(ResponseInterface::class)));

        $requester = new CurrencyRequesterStub($this->createMock(GatewayServiceInterface::class));
        $responseData = $requester->request();

        $this->assertInstanceOf(ResponseData::class, $responseData);
    }
}
