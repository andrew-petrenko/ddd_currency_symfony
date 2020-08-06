<?php

namespace App\Controller;

use Domain\Currency\Contracts\CurrencyServiceInterface;
use Domain\Currency\Enums\Bank;
use Domain\Transformer\Currency\CurrencyTransformer;
use Symfony\Component\HttpFoundation\JsonResponse;

class CurrencyController
{
    /**
     * @var CurrencyServiceInterface
     */
    private $currencyService;

    /**
     * @var CurrencyTransformer
     */
    private $transformer;

    public function __construct(CurrencyServiceInterface $currencyService, CurrencyTransformer $transformer)
    {
        $this->currencyService = $currencyService;
        $this->transformer = $transformer;
    }

    public function monoBank(): JsonResponse
    {
        $currencyCollection = $this->currencyService->getCurrencyFromBank(Bank::mono());
        $transformedCurrencies = $this->transformer->transformCollection($currencyCollection->all());

        return JsonResponse::create(['data' => $transformedCurrencies], JsonResponse::HTTP_OK);
    }

    public function privatBank(): JsonResponse
    {
        $currencyCollection = $this->currencyService->getCurrencyFromBank(Bank::privat());
        $transformedCurrencies = $this->transformer->transformCollection($currencyCollection->all());

        return JsonResponse::create(['data' => $transformedCurrencies], JsonResponse::HTTP_OK);
    }
}
