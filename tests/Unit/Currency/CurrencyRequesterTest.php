<?php

namespace App\Tests\Unit\Currency;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Gateway\ResponseData;
use PHPUnit\Framework\TestCase;

class CurrencyRequesterTest extends TestCase
{
    public function test()
    {
        $requester = $this->createMock(CurrencyRequesterInterface::class);
        $data = $requester->request();

        $this->assertInstanceOf(ResponseData::class, $data);
    }
}
