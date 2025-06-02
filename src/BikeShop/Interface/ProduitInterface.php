<?php

namespace BikeShop\Interface;

interface ProduitInterface
{
    public function getPrix(): float;
    public function afficherConfiguration(): void;
}