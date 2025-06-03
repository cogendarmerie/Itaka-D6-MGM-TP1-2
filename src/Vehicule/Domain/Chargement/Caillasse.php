<?php

namespace Vehicule\Domain\Chargement;

use Vehicule\Domain\AbstractChargement;

class Caillasse extends AbstractChargement
{
    public function __construct(int $poids)
    {
        parent::__construct(
            description: "Caillasse",
            poids: $poids
        );
    }
}