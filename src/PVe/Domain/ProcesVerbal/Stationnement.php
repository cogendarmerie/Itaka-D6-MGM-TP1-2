<?php

namespace PVe\Domain\ProcesVerbal;

use PVe\Domain\AbstractProcesVerbal;
use Vehicule\Domain\AbstractVehicule;

class Stationnement extends AbstractProcesVerbal
{
    public function __construct(AbstractVehicule $vehicule)
    {
        parent::__construct("Stationnement très génant", 4, 135, $vehicule);
    }
}