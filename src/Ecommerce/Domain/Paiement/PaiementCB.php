<?php

namespace Ecommerce\Domain\Paiement;

use Config\Domain\Notification;
use Ecommerce\Domain\AbstractPaiement;

class PaiementCB extends AbstractPaiement
{

    public function process(): void
    {
        Notification::showMessage("Paiement par CB effectue");
    }
}