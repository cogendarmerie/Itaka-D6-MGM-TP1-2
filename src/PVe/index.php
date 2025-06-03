<?php
namespace PVe;

use Ecommerce\Collection\PaiementCollection;
use Ecommerce\Domain\Paiement\PaiementCB;
use PVe\ProcesVerbal\Stationnement;
use PVe\ProcesVerbal\VitesseExcessive;
use Vehicule\Domain\Vehicule\Voiture;
use Vehicule\Enum\MarqueEnum;

require __DIR__ . '/../../vendor/autoload.php';

$peugeot307 = new Voiture(
    marque: MarqueEnum::PEUGEOT,
    modele: "307",
    annee: 2010,
    kilometrage: 1000,
    nombrePortes: 5
);

$paiements = new PaiementCollection();

$stationnement = new Stationnement($peugeot307);
$paiements->add(new PaiementCB($stationnement->getMontant()));

$vitesse = new VitesseExcessive(120, 50, $peugeot307);
$paiements->add(new PaiementCB($vitesse->getMontant()));

$paiements->process();