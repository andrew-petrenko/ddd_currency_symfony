<?php

namespace App\EventListener;

use Domain\Currency\Exceptions\FailedToConnectToBankException;
use Domain\Gateway\Exceptions\InvalidRequestMethodException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventSubscriberInterface
{
    use ExceptionResponses;

    public function onKernelException(ExceptionEvent $event)
    {
        $e = $event->getThrowable();

        if ($e instanceof FailedToConnectToBankException) {
            $response = $this->getFailedToConnectToBankExceptionResponse($e);
        } elseif ($e instanceof InvalidRequestMethodException) {
            $response = $this->getInvalidRequestMethodExceptionResponse($e);
        }

        $event->setResponse($response);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException'
        ];
    }
}
