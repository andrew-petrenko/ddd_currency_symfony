<?php

namespace App\Tests\Unit\Gateway;

use Domain\Gateway\Contracts\GatewayServiceInterface;
use Domain\Gateway\Exceptions\FailedToConnectException;
use Domain\Gateway\Exceptions\InvalidRequestMethodException;
use Domain\Gateway\GatewayService;
use Domain\Gateway\ResponseData;
use PHPUnit\Framework\TestCase;

class GatewayServiceTest extends TestCase
{
    /**
     * @dataProvider validMethods
     */
    public function testGatewayWorksWithValidMethods($methods)
    {
        $gateway = $this->initGateway($methods, '/');
        $this->assertInstanceOf(GatewayService::class, $gateway);
    }

    /**
     * @dataProvider invalidMethods
     */
    public function testGatewayThrowsExceptionWithInvalidMethods($methods)
    {
        $this->expectException(InvalidRequestMethodException::class);
        $this->initGateway($methods, '/');
    }

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
        $gateway = $this->initGateway('GET', '/');
        $this->expectException(FailedToConnectException::class);
        $gateway->connect();
    }

    public function request(): array
    {
        return [
            ['GET', 'http://google.com']
        ];
    }

    public function validMethods(): array
    {
        return [
            ['get'],
            ['GET'],
            ['Get'],
            ['post'],
            ['put'],
            ['patch']
        ];
    }

    public function invalidMethods(): array
    {
        return [
            ['asd'],
            ['pajsd'],
            ['asdasd']
        ];
    }

    protected function initGateway(string $method, string $url): GatewayServiceInterface
    {
        return (new GatewayService())
            ->setMethod($method)
            ->setUrl($url);
    }
}
