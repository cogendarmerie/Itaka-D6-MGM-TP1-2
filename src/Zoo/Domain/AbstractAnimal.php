<?php

namespace Zoo\Domain;

use Config\Domain\Notification;

abstract class AbstractAnimal
{
    public function __construct(
        private string $nom,
        private int $age
    )
    {
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function decrire(): void
    {
        Notification::showMessage("Je suis {$this->getNom()} et j'ai {$this->getAge()} ans");
    }

    public abstract function crier(): void;
}