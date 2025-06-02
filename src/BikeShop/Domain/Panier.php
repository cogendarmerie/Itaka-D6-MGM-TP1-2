<?php

namespace BikeShop\Domain;

use BikeShop\Collection\VeloCollection;
use BikeShop\Interface\ReductionTarifInterface;

class Panier
{
    public function __construct(
        private VeloCollection $velos
    )
    {
    }

    public function getVelos(): VeloCollection
    {
        return $this->velos;
    }

    public function afficherContenu(): void
    {
        /** @var AbstractVelo $velo */
        foreach ($this->velos->getAll() as $velo) {
            $velo->afficherConfiguration();
        }
    }

    public function getTotal(?ReductionTarifInterface $reduction = null): float
    {
        return array_sum(
            array_map(
                function (AbstractVelo $velo) {
                    return $velo->getPrix();
                },
                $this->velos->getAll()
            )
        ) * ($reduction ? 1 - $reduction->getPourcentage() : 1);
    }
}