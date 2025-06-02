<?php

namespace BikeShop\Domain\Accessoire;

use BikeShop\Domain\AbstractAccessoire;

class PackLampes extends AbstractAccessoire
{
    public function __construct()
    {
        parent::__construct("Pack éclairage LED A/R", 19.99);
    }
}