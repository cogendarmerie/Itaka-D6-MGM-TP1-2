<?php

namespace Ecommerce\Domain\Paiement;

use Config\Domain\Notification;
use Ecommerce\Domain\AbstractPaiement;

class PaiementVirement extends AbstractPaiement
{

    public function process(): void
    {
        Notification::showMessage("Virement effectué");
    }
}