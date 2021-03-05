<?php


namespace Simtel\PSR14Example;


use Psr\EventDispatcher\ListenerProviderInterface;
use Simtel\PSR14Example\Events\EventOne;
use Simtel\PSR14Example\Events\EventStoppable;
use Simtel\PSR14Example\Listeners\EventOneListener;
use Simtel\PSR14Example\Listeners\EventOneSecondListener;
use Simtel\PSR14Example\Listeners\EventStopListener;

class ListenerProvider implements ListenerProviderInterface
{

    protected array $listen = [
        EventOne::class => [
            EventOneListener::class,
            EventOneSecondListener::class
        ],
        EventStoppable::class => [
            EventStopListener::class
        ]
    ];

    /**
     * @inheritDoc
     */
    public function getListenersForEvent(object $event): iterable
    {

        foreach ($this->listen as $key => $listens) {
            if ($event instanceof $key) {
                return $listens;
            }
        }
        return [];
    }
}