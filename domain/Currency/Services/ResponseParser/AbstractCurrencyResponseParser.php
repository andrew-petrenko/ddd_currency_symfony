<?php

namespace Domain\Currency\Services\ResponseParser;

use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Currency\Currency;
use Domain\Currency\CurrencyCollection;
use Domain\Gateway\ResponseData;

abstract class AbstractCurrencyResponseParser implements CurrencyResponseParserInterface
{
    /**
     * @var CurrencyCollection
     */
    protected $currencyCollection;

    public function __construct()
    {
        $this->currencyCollection = new CurrencyCollection();
    }

    public function parse(ResponseData $responseData): void
    {
        $decodedResponse = $responseData->getDecodedResponse();
        $this->addValidToCollection($decodedResponse);
    }

    public function getParsedCollection(): CurrencyCollection
    {
        return $this->currencyCollection;
    }

    protected function addValidToCollection(array $data): void
    {
        foreach ($data as $item) {
            if ($this->validate($item)) {
                $this->currencyCollection->add($this->makeCurrency($item));
            } elseif (count($this->currencyCollection->getCollection()) > 3) {
                break;
            }
        }
    }

    abstract protected function makeCurrency(\stdClass $item): Currency;

    abstract protected function validate(\stdClass $item): bool;
}
