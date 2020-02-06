<?php

namespace Domain\Currency\Services;

use Domain\Currency\Contracts\CurrencyRequesterInterface;
use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Currency\Contracts\CurrencyServiceInterface;
use Domain\Currency\CurrencyCollection;

class CurrencyService implements CurrencyServiceInterface
{
    /**
     * @var CurrencyRequesterInterface
     */
    private $currencyRequester;

    /**
     * @var CurrencyResponseParserInterface
     */
    private $responseParser;

    public function __construct(
        CurrencyRequesterInterface $currencyRequester,
        CurrencyResponseParserInterface $responseParser
    ) {
        $this->currencyRequester = $currencyRequester;
        $this->responseParser = $responseParser;
    }

    public function getCurrencyFromBank(): CurrencyCollection
    {
        $responseData = $this->currencyRequester->request();
        $this->responseParser->parse($responseData);

        return $this->responseParser->getCollection();
    }
}
