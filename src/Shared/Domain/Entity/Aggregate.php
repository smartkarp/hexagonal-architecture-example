<?php

declare(strict_types=1);

namespace App\Shared\Domain\Entity;

use App\Shared\Domain\Event\EventInterface;

abstract class Aggregate
{
    /**
     * @var EventInterface[]
     */
    private array $events = [];

    /**
     * @return EventInterface[]
     */
    public function popEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

    abstract public function getId(): string;

    protected function raise(EventInterface $event): void
    {
        $this->events[] = $event;
    }
}
