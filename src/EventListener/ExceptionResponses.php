<?php

namespace App\EventListener;

use Domain\Currency\Exceptions\FailedToConnectToBankException;
use Domain\Gateway\Exceptions\InvalidRequestMethodException;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ExceptionResponses
{
    protected function getFailedToConnectToBankExceptionResponse(FailedToConnectToBankException $e): JsonResponse
    {
        return $this->defaultResponse($e, JsonResponse::HTTP_GATEWAY_TIMEOUT);
    }

    protected function getInvalidRequestMethodExceptionResponse(InvalidRequestMethodException $e): JsonResponse
    {
        return $this->defaultResponse($e, JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    private function defaultResponse(\Exception $e, int $statusCode): JsonResponse
    {
        return (new JsonResponse())
            ->setData(['message' => $e->getMessage()])
            ->setStatusCode($statusCode);
    }
}
