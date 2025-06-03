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

    public function afficherInfos(): void
    {
        $this->displayInfos([
            'marque' => $this->getMarque()->name,
            'modele' => $this->getModele(),
            'annee' => $this->getAnnee(),
            'kilometrage' => $this->getKilometrage(),
            'nombre entretiens' => $this->getEntretiens()->count(),
            'nombre portes' => $this->getNombrePortes()
        ]);
        $this->getEntretiens()->afficherEntretiens();
    }
}