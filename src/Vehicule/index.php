<?php
namespace Vehicule;

use Vehicule\Domain\Vehicule\Camion;
use Vehicule\Domain\Vehicule\Moto;
use Vehicule\Domain\Vehicule\Voiture;
use Vehicule\Enum\MarqueEnum;

require __DIR__ . '/../../vendor/autoload.php';

// Voiture
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

$voiture->afficherInfos();

// Moto
$moto = new Moto(
    marque: MarqueEnum::PEUGEOT,
    modele: "507",
    annee: 2015,
    kilometrage: 200,
    cilyndree: 50
);

$moto->afficherInfos();

// Camion
$camion = new Camion(
    marque: MarqueEnum::PEUGEOT,
    modele: "Truck Diamond",
    annee: 2026,
    kilometrage: 1000,
    poidsMax: 10000,
    chargeActuelle: 8000
);
$camion->afficherInfos();
$camion->charger(1000);
$camion->afficherInfos();