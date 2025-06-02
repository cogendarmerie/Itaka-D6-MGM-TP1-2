<?php

namespace BikeShop\Domain\Accessoire;

use BikeShop\Domain\AbstractAccessoire;

class MoteurElectricqueAccessoire extends AbstractAccessoire
{
    public function __construct()
    {
        parent::__construct("Moteur électrification", 702.49);
    }
}