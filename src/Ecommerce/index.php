<?php
namespace Ecommerce;

use Ecommerce\Collection\PaiementCollection;
use Ecommerce\Domain\Paiement\PaiementCB;
use Ecommerce\Domain\Paiement\PaiementPaypal;
use Ecommerce\Domain\Paiement\PaiementVirement;

require __DIR__ . '/../../vendor/autoload.php';

$cb = new PaiementCB(10);
$paypal = new PaiementPaypal(20);
$virement = new PaiementVirement(150);

$operations = new PaiementCollection();

$operations->add($cb);
$operations->add($paypal);
$operations->add($virement);

$operations->process();