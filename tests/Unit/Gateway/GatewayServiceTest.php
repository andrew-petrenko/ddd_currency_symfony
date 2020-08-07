<?php

namespace App\Tests\Unit\Gateway;

use Domain\Gateway\GatewayService;
use Domain\Gateway\RequestMethod;
use Domain\Gateway\ResponseData;
use PHPUnit\Framework\TestCase;

class GatewayServiceTest extends TestCase
{
    public function testCreation()
    {
        $gatewayService = new GatewayService();

        $this->assertInstanceOf(GatewayService::class, $gatewayService);
    }

    public function testRequestReturnsGatewayService()
    {
        $gatewayService = new GatewayService();

        $this->assertInstanceOf(
            ResponseData::class,
            $gatewayService->request(RequestMethod::get(), '0.0.0.0')
        );
    }

    public function testRequestThrowsOnCatchException()
    {
        // @todo think about client mocking
        $this->assertTrue(true);
    }
}
