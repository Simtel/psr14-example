<?php

namespace Simtel\PSR14Example\Events;

use Psr\EventDispatcher\StoppableEventInterface;

class EventStoppable implements StoppableEventInterface
{
    public bool $isModified = false;

    /**
     * {@inheritDoc}
     */
    public function isPropagationStopped(): bool
    {
        return true;
    }

    public function setIsModified(bool $value): void
    {
        $this->isModified = $value;
    }

    public function isModified(): bool
    {
        return $this->isModified;
    }
}
