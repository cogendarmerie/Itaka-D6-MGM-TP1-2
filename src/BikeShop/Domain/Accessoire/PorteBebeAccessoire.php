<?php

namespace BikeShop\Domain\Accessoire;

use BikeShop\Domain\AbstractAccessoire;

class PorteBebeAccessoire extends AbstractAccessoire
{
    public function __construct()
    {
        parent::__construct("Porte bébé", 119.99);
    }
}