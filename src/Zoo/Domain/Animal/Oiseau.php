<?php

namespace Zoo\Domain\Animal;

use Config\Domain\Notification;
use Zoo\Domain\AbstractAnimal;
use Zoo\Enum\EspeceOiseauEnum;

class Oiseau extends AbstractAnimal
{
    public function __construct(string $nom, int $age, private EspeceOiseauEnum $espece)
    {
        parent::__construct($nom, $age);
    }

    public function getEspece(): EspeceOiseauEnum
    {
        return $this->espece;
    }

    public function decrire(): void
    {
        Notification::showMessage("Je suis {$this->getNom()} et j'ai {$this->getAge()} ans, je suis de l'éspèce des {$this->getEspece()->value}");
    }

    public function crier(): void
    {
        Notification::showMessage("Cui-cui");
    }
}