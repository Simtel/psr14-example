<?php


namespace Simtel\PSR14Example;


use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\StoppableEventInterface;
use Simtel\PSR14Example\Events\EventOne;
use Simtel\PSR14Example\Events\EventStoppable;

class App
{

    public EventOne $eventOne;

    public StoppableEventInterface $eventStop;

    /**
     * @var EventDispatcherInterface
     */
    protected EventDispatcherInterface $eventDispatcher;

    /**
     * App constructor.
     * @param EventOne $event
     * @param StoppableEventInterface $eventStop
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        EventOne $event,
        StoppableEventInterface $eventStop,
        EventDispatcherInterface $eventDispatcher
    )
    {
        $this->eventStop = $eventStop;
        $this->eventOne = $event;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     *
     */
    public function execute(): void
    {
        $this->eventDispatcher->dispatch($this->eventOne);
        $this->eventDispatcher->dispatch($this->eventStop);

    }

}