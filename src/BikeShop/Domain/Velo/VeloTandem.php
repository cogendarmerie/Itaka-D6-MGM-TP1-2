<?php

namespace BikeShop\Domain\Velo;

use BikeShop\Domain\AbstractVelo;

class VeloTandem extends AbstractVelo
{
    public function __construct(
        string $marque,
        int $prix,
        string $couleur,
        private int $nombreDePlaces = 2
    )
    {
        parent::__construct($marque, $prix, $couleur);
    }

    public function getNombreDePlaces(): int
    {
        return $this->nombreDePlaces;
    }

    public function afficherConfiguration(): void
    {
        $this->displayConfigurationFromChildren(get_object_vars($this));
    }
}