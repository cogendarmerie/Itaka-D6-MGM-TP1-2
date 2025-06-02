<?php

namespace BikeShop\Domain;

use BikeShop\Collection\ProduitsCollection;
use BikeShop\Interface\ProduitInterface;
use BikeShop\Interface\ReductionTarifInterface;

class Panier
{
    public function __construct(
        private ProduitsCollection $produits
    )
    {
    }

    public function getProduits(): ProduitsCollection
    {
        return $this->produits;
    }

    public function afficherContenu(): void
    {
        /** @var ProduitInterface $produit */
        foreach ($this->produits->getAll() as $produit) {
            $produit->afficherConfiguration();
        }
    }

    public function getTotal(?ReductionTarifInterface $reduction = null): float
    {
        return array_sum(
            array_map(
                function (ProduitInterface $produit) {
                    return $produit->getPrix();
                },
                $this->produits->getAll()
            )
        ) * ($reduction ? 1 - $reduction->getPourcentage() : 1);
    }
}