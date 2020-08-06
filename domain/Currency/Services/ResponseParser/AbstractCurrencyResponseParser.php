<?php

namespace Domain\Currency\Services\ResponseParser;

use Domain\Currency\Contracts\CurrencyResponseParserInterface;
use Domain\Currency\Currency;
use Domain\Currency\CurrencyCollection;
use Domain\Gateway\ResponseData;

abstract class AbstractCurrencyResponseParser implements CurrencyResponseParserInterface
{
    protected CurrencyCollection $currencyCollection;

    public function __construct()
    {
        $this->currencyCollection = new CurrencyCollection();
    }

    public function parse(ResponseData $responseData): void
    {
        $decodedResponse = $responseData->getDecodedResponseContent();
        $this->addValidToCollection($decodedResponse);
    }

    public function getParsedCollection(): CurrencyCollection
    {
        return $this->currencyCollection;
    }

    protected function addValidToCollection(array $data): void
    {
        foreach ($data as $item) {
            if (static::isValid($item)) {
                $this->currencyCollection->add(static::makeCurrency($item));
            } elseif ($this->currencyCollection->length() >= 3) {
                break;
            }
        }
    }

    abstract protected static function makeCurrency(\stdClass $item): Currency;

    abstract protected static function isValid(\stdClass $item): bool;
}
