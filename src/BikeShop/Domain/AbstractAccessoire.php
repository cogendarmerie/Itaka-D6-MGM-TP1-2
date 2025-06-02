<?php

namespace BikeShop\Domain;

abstract class AbstractAccessoire
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

    public function getPrix(): int
    {
        return $this->prix;
    }
}