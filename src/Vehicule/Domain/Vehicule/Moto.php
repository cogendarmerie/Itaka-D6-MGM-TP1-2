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

    public function getCilyndree(): int
    {
        return $this->cilyndree;
    }

    public function afficherInfos(): void
    {
        $this->displayInfos([
            'marque' => $this->getMarque()->name,
            'modele' => $this->getModele(),
            'annee' => $this->getAnnee(),
            'kilometrage' => $this->getKilometrage(),
            'nombre entretiens' => $this->getEntretiens()->count(),
            'cilyndree' => $this->getCilyndree(),
        ]);
        $this->getEntretiens()->afficherEntretiens();
    }
}