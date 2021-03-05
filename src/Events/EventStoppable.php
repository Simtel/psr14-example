<?php


namespace Simtel\PSR14Example\Events;


use Psr\EventDispatcher\StoppableEventInterface;

class EventStoppable implements StoppableEventInterface
{

    public bool $isModified = false;

    /**
     * @inheritDoc
     */
    public function isPropagationStopped(): bool
    {
        return true;
    }

    /**
     * @param $value
     */
    public function setIsModified($value): void
    {
        $this->isModified = $value;
    }

    /**
     * @return bool
     */
    public function isModified(): bool
    {
        return $this->isModified;
    }


}