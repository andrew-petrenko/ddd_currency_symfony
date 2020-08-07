<?php

namespace App\Tests\Unit\Gateway;

use Domain\Gateway\ResponseData;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ResponseDataTest extends TestCase
{
    public function testCreation()
    {
        $responseData = new ResponseData($this->createMock(ResponseInterface::class));

        $this->assertInstanceOf(ResponseData::class, $responseData);
    }

    public function testGetResponse()
    {
        $responseData = new ResponseData($this->createMock(ResponseInterface::class));

        $this->assertInstanceOf(ResponseInterface::class, $responseData->getResponse());
    }

    public function testGetDecodedResponseContent()
    {
        $response = $this->createMock(ResponseInterface::class);
        $body = $this->createMock(StreamInterface::class);
        $response
            ->method('getBody')
            ->willReturn($body);
        $body
            ->method('getContents')
            ->willReturn('[{}]');
        $responseData = new ResponseData($response);

        $this->assertIsArray($responseData->getDecodedResponseContent());
        $this->assertContainsOnlyInstancesOf(\stdClass::class, $responseData->getDecodedResponseContent());
    }
}
