<?php
namespace Vehicule;

use Vehicule\Domain\Vehicule\Voiture;
use Vehicule\Enum\MarqueEnum;

require __DIR__ . '/../../vendor/autoload.php';

$voiture = new Voiture(
    marque: MarqueEnum::PEUGEOT,
    modele: "5008",
    annee: 2018,
    kilometrage: 10000,
    nombrePortes: 5
);

$voiture->afficherDernierEntretien();

$voiture->programmerEntretien($voiture->prochainEntretien());
$voiture->afficherDernierEntretien();
$voiture->afficherProchainEntretien();

$voiture->getEntretiens()->afficherEntretiens();