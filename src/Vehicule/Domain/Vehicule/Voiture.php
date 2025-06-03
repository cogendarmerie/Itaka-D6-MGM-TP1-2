<?php

namespace Vehicule\Domain\Vehicule;

use Vehicule\Domain\AbstractVehicule;
use Vehicule\Enum\MarqueEnum;

class Voiture extends AbstractVehicule
{
    public function __construct(
        MarqueEnum $marque,
        string $modele,
        int $annee,
        int $kilometrage,
        private int $nombrePortes
    )
    {
        parent::__construct($marque, $modele, $annee, $kilometrage);
    }

    public function getNombrePortes(): int
    {
        return $this->nombrePortes;
    }
}