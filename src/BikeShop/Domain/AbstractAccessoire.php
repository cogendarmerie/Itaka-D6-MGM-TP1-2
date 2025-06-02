<?php

namespace BikeShop\Domain;

use BikeShop\Interface\ProduitInterface;

abstract class AbstractAccessoire implements ProduitInterface
{
    public function __construct(
        private string $nom,
        private int $prix
    )
    {
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function afficherConfiguration(): void
    {
        echo "------------" . PHP_EOL;
        echo "{$this->getNom()} - {$this->getPrix()} €" . PHP_EOL;
    }
}