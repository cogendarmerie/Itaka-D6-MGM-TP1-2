<?php

namespace Vehicule\Domain\Chargement;

use Vehicule\Domain\AbstractChargement;

class BarrieresVauban extends AbstractChargement
{
    public function __construct()
    {
        parent::__construct("Pack 20 barrières vauban", 500);
    }
}