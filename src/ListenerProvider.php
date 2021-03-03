<?php


namespace Simtel\PSR14Example;


use Psr\EventDispatcher\ListenerProviderInterface;
use Simtel\PSR14Example\Events\EventOne;
use Simtel\PSR14Example\Listeners\EventOneListener;
use Simtel\PSR14Example\Listeners\EventOneSecondListener;

class ListenerProvider implements ListenerProviderInterface
{

    protected array $listen = [
        EventOne::class => [
            EventOneListener::class,
            EventOneSecondListener::class
        ]
    ];

    /**
     * @inheritDoc
     */
    public function getListenersForEvent(object $event): iterable
    {
        return $this->listen[get_class($event)];
    }
}