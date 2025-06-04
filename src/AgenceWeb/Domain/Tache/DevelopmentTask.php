<?php

namespace AgenceWeb\Domain\Tache;

use AgenceWeb\Domain\AbstractTache;
use AgenceWeb\Domain\Developer;
use AgenceWeb\Interfacce\BillableInterface;

class DevelopmentTask extends AbstractTache implements BillableInterface
{
    public function __construct(
        string $titre,
        Developer $developer,
        private float $estimatedHours,
        bool $terminee = false
    )
    {
        parent::__construct($titre, $developer, $terminee);
    }

    public function getEstimatedHours(): float
    {
        return $this->estimatedHours;
    }

    public function calculateCost(): float
    {
        return $this->getDeveloper()->getTjm() * $this->getEstimatedHours();
    }
}