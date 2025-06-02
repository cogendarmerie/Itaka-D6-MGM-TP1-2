<?php
namespace BikeShop;
use BikeShop\Collection\ProduitsCollection;
use BikeShop\Domain\Accessoire\MoteurElectricqueAccessoire;
use BikeShop\Domain\Accessoire\PackLampes;
use BikeShop\Domain\Accessoire\PanierAvantAccessoire;
use BikeShop\Domain\Accessoire\PorteBebeAccessoire;
use BikeShop\Domain\Panier;
use BikeShop\Domain\ReducationTarif\ReductionEmploye;
use BikeShop\Domain\ReducationTarif\ReductionEtudiant;
use BikeShop\Domain\Velo\VeloCargo;
use BikeShop\Domain\Velo\VeloTandem;

require __DIR__ . '/../../vendor/autoload.php';

$tandem = new VeloTandem("Cyclocity", 12000, "bleu");
$cargo = new VeloCargo("Decathlon", 10000, "noir", 3, 10);

$tandem->getAccessoires()->add(new MoteurElectricqueAccessoire());

$cargo->getAccessoires()->add(new PanierAvantAccessoire());
$cargo->getAccessoires()->add(new PorteBebeAccessoire());
$cargo->getAccessoires()->add(new MoteurElectricqueAccessoire());

$packLampes = new PackLampes();
$moteurElectricqueRechange = new MoteurElectricqueAccessoire();

$produits = new ProduitsCollection();
$produits->add($tandem);
$produits->add($cargo);
$produits->add($packLampes);
$produits->add($moteurElectricqueRechange);

$panier = new Panier($produits);

$panier->afficherContenu();
echo "Total : {$panier->getTotal()} €" . PHP_EOL;
echo "Total étudiant : {$panier->getTotal(new ReductionEtudiant())} €". PHP_EOL;
echo "Total employé : {$panier->getTotal(new ReductionEmploye())} €";