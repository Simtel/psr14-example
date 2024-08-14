<?php

namespace Simtel\PSR14Example;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\StoppableEventInterface;
use Simtel\PSR14Example\Events\EventOne;

class App
{
    /**
     * App constructor.
     */
    public function __construct(
        public EventOne $eventOne,
        public StoppableEventInterface $eventStop,
        protected EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function execute(): void
    {
        $this->eventDispatcher->dispatch($this->eventOne);
        $this->eventDispatcher->dispatch($this->eventStop);

    }
}
