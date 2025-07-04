<?php

namespace BikeShop\Domain\Velo;

use BikeShop\Domain\AbstractVelo;
use BikeShop\Interface\ProduitInterface;

class VeloCargo extends AbstractVelo
{
    public function __construct(
        string $marque,
        float $prix,
        string $couleur,
        private int $nombreRoues,
        private int $volumeStockage
    )
    {
        parent::__construct($marque, $prix, $couleur);
    }

    public function getNombreRoues(): int
    {
        return $this->nombreRoues;
    }

    public function getVolumeStockage(): int
    {
        return $this->volumeStockage;
    }

    public function afficherConfiguration(): void
    {
        $this->displayConfigurationFromChildren(get_object_vars($this));
    }
}