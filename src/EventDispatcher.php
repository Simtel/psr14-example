<?php


namespace Simtel\PSR14Example;


use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Simtel\PSR14Example\Contracts\ListenerInterface;

class EventDispatcher implements EventDispatcherInterface
{

    protected ListenerProviderInterface $provider;

    /**
     * EventDispatcher constructor.
     * @param ListenerProviderInterface $provider
     */
    public function __construct(ListenerProviderInterface $provider)
    {
        $this->provider = $provider;
    }


    /**
     * @param object $event
     * @return object|void
     */
    public function dispatch(object $event): object
    {

        foreach ($this->provider->getListenersForEvent($event) as $listener) {
            /** @var ListenerInterface $handle */
            $handle = new $listener($event);
            $handle->handle();
        }
        return $event;
    }

}