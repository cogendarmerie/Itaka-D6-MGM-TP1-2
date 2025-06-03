<?php

namespace Vehicule\Domain\Vehicule;

use Config\Domain\Notification;
use Vehicule\Collection\EntretienCollection;
use Vehicule\Domain\AbstractVehicule;
use Vehicule\Enum\MarqueEnum;

class Camion extends AbstractVehicule
{
    public function __construct(
        MarqueEnum $marque,
        string $modele,
        int $annee,
        int $kilometrage,
        private int $poidsMax,
        private int $chargeActuelle,
        EntretienCollection $entretiens = new EntretienCollection()
    )
    {
        parent::__construct($marque, $modele, $annee, $kilometrage, $entretiens);
    }

    public function getPoidsMax(): int
    {
        return $this->poidsMax;
    }

    public function getChargeActuelle(): int
    {
        return $this->chargeActuelle;
    }

    public function isTropCharge(): bool
    {
        return $this->getChargeActuelle() > $this->getPoidsMax();
    }

    public function charger(int $poids): void
    {
        if ($this->chargeActuelle + $poids > $this->getPoidsMax()) {
            Notification::showErrorMessage("Impossible de charger le véhicule : " . $this->getChargeActuelle() + $poids - $this->getPoidsMax() . "kg en trop");
            return;
        }

        $this->chargeActuelle += $poids;
    }

    public function afficherInfos(): void
    {
        $this->displayInfos([
            'marque' => $this->getMarque()->name,
            'modele' => $this->getModele(),
            'annee' => $this->getAnnee(),
            'kilometrage' => $this->getKilometrage(),
            'nombre entretiens' => $this->getEntretiens()->count(),
            'poids max' => $this->getPoidsMax(),
            'charge actuelle' => $this->getChargeActuelle(),
        ]);

        if ($this->isTropCharge()) {
            Notification::showErrorMessage("Le véhicule est trop chargé");
        }

        $this->getEntretiens()->afficherEntretiens();
    }
}