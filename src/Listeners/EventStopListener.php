<?php


namespace Simtel\PSR14Example\Listeners;


use Simtel\PSR14Example\Contracts\ListenerInterface;
use Simtel\PSR14Example\Events\EventStoppable;

class EventStopListener implements ListenerInterface
{

    public EventStoppable $event;

    /**
     * EventStopListener constructor.
     * @param EventStoppable $event
     */
    public function __construct(EventStoppable $event)
    {
        $this->event = $event;
    }


    public function handle()
    {
        $this->event->setIsModified(true);
    }
}