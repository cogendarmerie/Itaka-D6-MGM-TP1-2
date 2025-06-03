<?php

namespace Zoo\Collection;

use Zoo\Domain\AbstractAnimal;

class AnimalCollection
{
    private array $animals = [];

    public function add(AbstractAnimal $animal): void
    {
        $this->animals[] = $animal;
    }

    public function getAll(): array
    {
        return $this->animals;
    }

    public function count(): int
    {
        return count($this->animals);
    }

    public function decrire(): void
    {
        /** @var AbstractAnimal $animal */
        foreach ($this->animals as $animal) {
            $animal->decrire();
        }
    }

    public function crier(): void
    {
        /** @var AbstractAnimal $animal */
        foreach ($this->animals as $animal) {
            $animal->crier();
        }
    }
}