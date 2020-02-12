<?php

namespace App\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class CurrencyControllerTest extends WebTestCase
{
    public function testGetCurrency()
    {
        $client = static::createClient();
        $client->request('GET', '/currency');

        $this->assertEquals(
            JsonResponse::HTTP_OK,
            $client->getResponse()->getStatusCode()
        );
    }
}
