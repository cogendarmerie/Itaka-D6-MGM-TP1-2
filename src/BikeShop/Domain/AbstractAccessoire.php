<?php

namespace BikeShop\Domain;

use BikeShop\Interface\ProduitInterface;
use Config\Domain\Notification;

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
        Notification::showSeparator();
        Notification::showMessage("{$this->getNom()} - {$this->getPrix()} €");
    }
}