<?php


namespace Simtel\PSR14Example\Listeners;


use Simtel\PSR14Example\Contracts\ListenerInterface;
use Simtel\PSR14Example\Events\EventOne;

class EventOneListener implements ListenerInterface
{

    protected EventOne $event;

    /**
     * EventOneListener constructor.
     * @param EventOne $event
     */
    public function __construct(EventOne $event)
    {
        $this->event = $event;
    }

    public function handle(): void
    {
        $this->event->cnt += 100;
    }


}