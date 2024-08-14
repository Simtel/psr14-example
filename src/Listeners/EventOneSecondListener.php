<?php

namespace Simtel\PSR14Example\Listeners;

use Simtel\PSR14Example\Contracts\ListenerInterface;
use Simtel\PSR14Example\Events\EventOne;

class EventOneSecondListener implements ListenerInterface
{
    /**
     * EventOneSecondListener constructor.
     */
    public function __construct(protected EventOne $event)
    {
    }

    public function handle(): void
    {
        $this->event->cnt += 300;
    }
}
