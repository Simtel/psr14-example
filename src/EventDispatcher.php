<?php

namespace Simtel\PSR14Example;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\EventDispatcher\StoppableEventInterface;
use Simtel\PSR14Example\Contracts\ListenerInterface;

class EventDispatcher implements EventDispatcherInterface
{
    /**
     * EventDispatcher constructor.
     */
    public function __construct(protected ListenerProviderInterface $provider)
    {
    }

    /**
     * @param object $event
     * @return object
     */
    public function dispatch(object $event): object
    {

        foreach ($this->provider->getListenersForEvent($event) as $listener) {
            if ($event instanceof StoppableEventInterface && $event->isPropagationStopped()) {
                break;
            }

            /** @var ListenerInterface $handle */
            $handle = new $listener($event);
            $handle->handle();
        }

        return $event;
    }
}
