<?php
namespace BikeShop;
use BikeShop\Collection\VeloCollection;
use BikeShop\Domain\Panier;
use BikeShop\Domain\Velo\VeloCargo;
use BikeShop\Domain\Velo\VeloTandem;

require __DIR__ . '/../../vendor/autoload.php';

$tandem = new VeloTandem("Cyclocity", 12000, "bleu");
$cargo = new VeloCargo("Decathlon", 10000, "noir", 3, 10);

$velos = new VeloCollection();
$velos->add($tandem);
$velos->add($cargo);

$panier = new Panier($velos);

$panier->afficherContenu();
echo "Total : {$panier->getTotal()} €";