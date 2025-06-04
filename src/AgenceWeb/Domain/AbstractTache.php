<?php

namespace AgenceWeb\Domain;

use AgenceWeb\Exception\TaskAlreadyCompletedException;
use AgenceWeb\Interfacce\BillableInterface;

abstract class AbstractTache implements BillableInterface
{
    public function __construct(
        private string $titre,
        private Developer $developer,
        private bool $terminee = false,
    )
    {
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDeveloper(): Developer
    {
        return $this->developer;
    }

    public function isTerminee(): bool
    {
        return $this->terminee;
    }

    public function completee(): void
    {
        if ($this->isTerminee()) {
            throw new TaskAlreadyCompletedException($this);
        }

        $this->terminee = true;
    }
}