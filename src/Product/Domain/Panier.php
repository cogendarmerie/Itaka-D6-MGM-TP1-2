<?php

namespace Product\Domain;

use Config\Domain\Notification;
use Product\Collection\ProduitsCollection;

class Panier
{
    public function __construct(
        private ProduitsCollection $produits
    )
    {
    }

    /**
     * Calculer le montant total du panier
     * @return float
     */
    public function getTotal(): float
    {
        return array_sum(
            array_map(
                function (Produit $produit): float {
                    return (float) $produit->getPrix();
                },
                $this->produits->getAll()
            )
        );
    }

    /**
     * Afficher les articles contenu dans le panier
     * @return void
     */
    public function afficherContenu(): void
    {
        /** @var Produit $produit */
        foreach ($this->produits->getAll() as $produit) {
            Notification::showMessage($produit->getNom() . " - " . $produit->getPrix());
        }
    }

    /**
     * Afficher le total
     * @return void
     */
    public function afficherTotal(): void
    {
        Notification::showSuccessMessage("Total : " . $this->getTotal());
    }
}