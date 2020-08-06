<?php

namespace App\EventListener;

use Domain\Core\Exceptions\Http\HttpException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventSubscriberInterface
{
    public function onKernelException(ExceptionEvent $event)
    {
        $e = $event->getThrowable();

        if ($e instanceof HttpException) {
            $response = self::jsonResponse($e, $e->getStatusCode());
        } else {
            $response = self::jsonResponse($e, JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        $event->setResponse($response);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException'
        ];
    }

    private static function jsonResponse(\Throwable $e, int $statusCode): JsonResponse
    {
        return (new JsonResponse())
            ->setData(['message' => $e->getMessage()])
            ->setStatusCode($statusCode);
    }
}
