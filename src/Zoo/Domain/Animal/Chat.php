<?php

namespace Zoo\Domain\Animal;

use Config\Domain\Notification;
use Zoo\Domain\AbstractAnimal;

class Chat extends AbstractAnimal
{
    public function __construct(string $nom, int $age, private string $couleur)
    {
        parent::__construct($nom, $age);
    }

    public function getCouleur(): string
    {
        return $this->couleur;
    }

    public function decrire(): void
    {
        Notification::showMessage("Je suis {$this->getNom()} et j'ai {$this->getAge()} ans, je suis de couleur {$this->getCouleur()}");
    }
}