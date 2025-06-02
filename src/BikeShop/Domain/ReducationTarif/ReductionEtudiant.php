<?php

namespace BikeShop\Domain\ReducationTarif;

use BikeShop\Interface\ReductionTarifInterface;

class ReductionEtudiant implements ReductionTarifInterface
{

    public function getPourcentage()
    {
        return 0.9;
    }
}