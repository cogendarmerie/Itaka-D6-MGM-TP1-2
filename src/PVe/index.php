<?php
namespace PVe;

use Config\Domain\Notification;
use Ecommerce\Domain\Paiement\PaiementCB;
use PVe\Collection\ProcesVerbalCollection;
use PVe\Domain\AvisContravention;
use PVe\Domain\ProcesVerbal\Stationnement;
use PVe\Domain\ProcesVerbal\VitesseExcessive;
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

$procesVerbaux = new ProcesVerbalCollection();
$procesVerbaux->add(new Stationnement($peugeot307));
$procesVerbaux->add(new VitesseExcessive(120, 50, $peugeot307));

$avisContravention = new AvisContravention($procesVerbaux);
Notification::showMessage("Montant à payer : " . $avisContravention->getMontant() . " €");

$avisContravention->encaisser(PaiementCB::class);