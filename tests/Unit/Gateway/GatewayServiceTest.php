<?php

namespace App\Tests\Unit\Gateway;

use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use Domain\Gateway\GatewayService;
use Domain\Gateway\RequestMethod;
use Domain\Gateway\ResponseData;
use PHPUnit\Framework\TestCase;

class GatewayServiceTest extends TestCase
{
    /**
     * @dataProvider request
     */
    public function testGatewayContainsResponseDataAfterSuccessRequest($method, $uri)
    {
        $gateway = $this->initGateway($method, $uri);
        $gateway->connect();
        $this->assertInstanceOf(ResponseData::class, $gateway->getResponseData());
    }

    public function testGatewayThrowsExceptionWhileFailedToConnect()
    {
        $gateway = $this->initGateway(RequestMethod::get(), '/');
        $this->expectException(FailedToConnectException::class);
        $gateway->connect();
    }

    public function request(): array
    {
        return [
            [RequestMethod::get(), 'http://google.com']
        ];
    }

    protected function initGateway(RequestMethod $method, string $url): GatewayServiceInterface
    {
        return (new GatewayService())
            ->setMethod($method)
            ->setUrl($url);
    }
}
