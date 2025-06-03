<?php

namespace Ecommerce\Domain;

use Config\Domain\Notification;

abstract class AbstractPaiement
{
    public function __construct(
        private float $montant
    )
    {
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function afficherMontant(): void
    {
        Notification::showMessage("Montant à payer : " . $this->montant . " €");
    }

    public abstract function process(): void;
}