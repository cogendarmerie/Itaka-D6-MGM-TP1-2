<?php

namespace BikeShop\Collection;

use BikeShop\Interface\ProduitInterface;

class ProduitsCollection
{
    private array $produits = [];

    public function add(ProduitInterface $produit): void
    {
        $this->produits[] = $produit;
    }

    public function getAll(): array
    {
        return $this->produits;
    }

    public function get(int $index): ?ProduitInterface
    {
        return $this->produits[$index] ?? null;
    }

    public function count(): int
    {
        return count($this->produits);
    }
}