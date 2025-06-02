<?php

namespace Product\Domain;

class Produit
{
    public function __construct(
        private string $nom,
        private float $prix
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
}