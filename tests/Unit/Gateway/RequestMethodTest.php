<?php

namespace App\Tests\Unit\Gateway;

use Domain\Gateway\RequestMethod;
use PHPUnit\Framework\TestCase;

class RequestMethodTest extends TestCase
{
    public function testGet()
    {
        $method = RequestMethod::get();

        $this->assertInstanceOf(RequestMethod::class, $method);
        $this->assertEquals('GET', $method->value());
    }

    public function testPost()
    {
        $method = RequestMethod::post();

        $this->assertInstanceOf(RequestMethod::class, $method);
        $this->assertEquals('POST', $method->value());
    }

    public function testPut()
    {
        $method = RequestMethod::put();

        $this->assertInstanceOf(RequestMethod::class, $method);
        $this->assertEquals('PUT', $method->value());
    }

    public function testPatch()
    {
        $method = RequestMethod::patch();

        $this->assertInstanceOf(RequestMethod::class, $method);
        $this->assertEquals('PATCH', $method->value());
    }

    public function testDelete()
    {
        $method = RequestMethod::delete();

        $this->assertInstanceOf(RequestMethod::class, $method);
        $this->assertEquals('DELETE', $method->value());
    }
}
