<?php

namespace Vehicule\Domain\Vehicule;

use Vehicule\Domain\AbstractVehicule;
use Vehicule\Enum\MarqueEnum;

class Moto extends AbstractVehicule
{
    public function __construct(
        MarqueEnum $marque,
        string $modele,
        int $annee,
        int $kilometrage,
        private int $cilyndree
    )
    {
        parent::__construct($marque, $modele, $annee, $kilometrage);
    }

    public function getCilydree(): int
    {
        return $this->cilyndree;
    }
}