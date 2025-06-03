<?php

namespace Vehicule\Domain\Chargement;

use Vehicule\Domain\AbstractChargement;

class SeparateurDeVoies extends AbstractChargement
{
    public function __construct()
    {
        parent::__construct("Palette 50 séparateur de voies", 300);
    }
}