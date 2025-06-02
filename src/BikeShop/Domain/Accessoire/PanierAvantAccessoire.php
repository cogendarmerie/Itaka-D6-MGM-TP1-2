<?php

namespace BikeShop\Domain\Accessoire;

use BikeShop\Domain\AbstractAccessoire;

class PanierAvantAccessoire extends AbstractAccessoire
{
    public function __construct()
    {
        parent::__construct("Panier avant", 19.99);
    }
}