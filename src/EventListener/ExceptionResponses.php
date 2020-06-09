<?php

namespace App\EventListener;

use Domain\Currency\Exceptions\FailedToConnectToBankException;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ExceptionResponses
{
    protected function getFailedToConnectToBankExceptionResponse(FailedToConnectToBankException $e): JsonResponse
    {
        return $this->defaultResponse($e, JsonResponse::HTTP_GATEWAY_TIMEOUT);
    }

    private function defaultResponse(\Exception $e, int $statusCode): JsonResponse
    {
        return (new JsonResponse())
            ->setData(['message' => $e->getMessage()])
            ->setStatusCode($statusCode);
    }
}
