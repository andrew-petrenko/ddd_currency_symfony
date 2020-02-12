<?php

namespace App\Controller;

use Domain\Currency\Contracts\CurrencyServiceInterface;
use Domain\Transformer\Currency\CurrencyTransformer;
use Symfony\Component\HttpFoundation\JsonResponse;

class CurrencyController
{
    public function index(CurrencyServiceInterface $currencyService, CurrencyTransformer $transformer): JsonResponse
    {
        $currencies = $currencyService->getCurrencyFromBank();

        return new JsonResponse(
            $transformer->transformCollection($currencies->getCollection()),
            JsonResponse::HTTP_OK
        );
    }
}
