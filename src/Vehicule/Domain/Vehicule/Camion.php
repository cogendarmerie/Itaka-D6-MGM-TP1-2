<?php

namespace Vehicule\Domain\Vehicule;

use Config\Domain\Notification;
use Vehicule\Collection\ChargementCollection;
use Vehicule\Collection\EntretienCollection;
use Vehicule\Domain\AbstractChargement;
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
        private ChargementCollection $chargements = new ChargementCollection(),
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
        return $this->chargements->getPoidsTotal();
    }

    public function getChargements(): ChargementCollection
    {
        return $this->chargements;
    }

    public function isTropCharge(): bool
    {
        return $this->getChargeActuelle() > $this->getPoidsMax();
    }

    public function charger(AbstractChargement $chargement): void
    {
        if ($this->getChargeActuelle() + $chargement->getPoids() > $this->getPoidsMax()) {
            Notification::showErrorMessage("Impossible de charger le véhicule : " . $this->getChargeActuelle() + $chargement->getPoids() - $this->getPoidsMax() . "kg en trop");
            return;
        }

        $this->chargements->add($chargement);
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