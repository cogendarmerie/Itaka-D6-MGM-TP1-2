<?php

namespace Product\Collection;

use Product\Domain\Produit;

class ProduitsCollection
{
    private array $produits = [];

    public function add(Produit $produit, int $quantity = 1): void
    {
        for ($i = 0; $i < $quantity; $i++) {
            $this->produits[] = $produit;
        }
    }

    public function getAll(): array
    {
        return $this->produits;
    }

    public function get(int $index): ?Produit
    {
        return $this->produits[$index] ?? null;
    }

    public function count(): int
    {
        return count($this->produits);
    }
}