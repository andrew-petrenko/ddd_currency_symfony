<?php

namespace App\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class CurrencyControllerTest extends WebTestCase
{
    public function testGetMonobankCurrency()
    {
        $client = static::createClient();
        $client->request('GET', '/api/currencies/mono');

        $this->assertJson('{"data":[]}', $client->getResponse()->getContent());

        $this->assertEquals(
            JsonResponse::HTTP_OK,
            $client->getResponse()->getStatusCode()
        );
    }

    public function testGetPrivatbankCurrency()
    {
        $client = self::createClient();
        $client->request('GET', '/api/currencies/privat');

        $this->assertJson('{"data":[]}', $client->getResponse()->getContent());
        $this->assertEquals(
            JsonResponse::HTTP_OK,
            $client->getResponse()->getStatusCode()
        );
    }
}
