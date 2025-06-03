<?php

namespace Zoo\Domain\Animal;

use Config\Domain\Notification;
use Zoo\Domain\AbstractAnimal;
use Zoo\Enum\RaceChienEnum;

class Chien extends AbstractAnimal
{
    public function __construct(string $nom, int $age, private RaceChienEnum $race)
    {
        parent::__construct($nom, $age);
    }

    public function getRace(): RaceChienEnum
    {
        return $this->race;
    }

    public function decrire(): void
    {
        Notification::showMessage("Je suis {$this->getNom()} et j'ai {$this->getAge()} ans, je suis un {$this->getRace()->value}");
    }

    public function crier(): void
    {
        Notification::showMessage("Wouf");
    }
}