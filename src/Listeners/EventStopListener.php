<?php

namespace Simtel\PSR14Example\Listeners;

use Simtel\PSR14Example\Contracts\ListenerInterface;
use Simtel\PSR14Example\Events\EventStoppable;

class EventStopListener implements ListenerInterface
{
    /**
     * EventStopListener constructor.
     */
    public function __construct(public EventStoppable $event)
    {
    }

    public function handle(): void
    {
        $this->event->setIsModified(true);
    }
}
