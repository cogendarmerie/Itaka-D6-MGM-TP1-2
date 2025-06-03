<?php

namespace PVe\Domain;

use Vehicule\Domain\AbstractVehicule;

abstract class AbstractProcesVerbal
{
    public function __construct(
        private string $infraction,
        private int $categorie,
        private int $montant,
        private AbstractVehicule $vehicule
    )
    {
    }

    public function getInfraction(): string
    {
        return $this->infraction;
    }

    public function getCategorie(): int
    {
        return $this->categorie;
    }

    public function getMontant(): int
    {
        return $this->montant;
    }

    public function getVehicule(): AbstractVehicule
    {
        return $this->vehicule;
    }
}