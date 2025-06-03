<?php

namespace Ecommerce\Domain\Paiement;

use Config\Domain\Notification;
use Ecommerce\Domain\AbstractPaiement;

class PaiementPaypal extends AbstractPaiement
{

    public function process(): void
    {
        Notification::showMessage("Paiement par Paypal effectué");
    }
}