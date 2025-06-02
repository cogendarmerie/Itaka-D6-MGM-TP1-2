<?php

namespace BikeShop\Domain\ReducationTarif;

use BikeShop\Interface\ReductionTarifInterface;

class ReductionEmploye implements ReductionTarifInterface
{

    public function getPourcentage()
    {
        return 0.5;
    }
}