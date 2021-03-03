<?php


namespace Simtel\PSR14Example;


use Psr\EventDispatcher\EventDispatcherInterface;
use Simtel\PSR14Example\Events\EventOne;

class App
{
    /**
     * @var EventDispatcherInterface
     */
    protected EventDispatcherInterface $eventDispatcher;

    /**
     * App constructor.
     * @param $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     *
     */
    public function execute() {
        $event = new EventOne();
        $this->eventDispatcher->dispatch($event);
        var_dump($event);
    }

}