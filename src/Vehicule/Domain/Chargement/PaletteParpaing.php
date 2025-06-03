<?php

namespace Vehicule\Domain\Chargement;

use Vehicule\Domain\AbstractChargement;

class PaletteParpaing extends AbstractChargement
{
    public function __construct(int $poids)
    {
        parent::__construct("Palette parpaing", $poids);
    }
}