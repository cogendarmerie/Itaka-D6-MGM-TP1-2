<?php
namespace Product;
use Product\Collection\ProduitsCollection;
use Product\Domain\Panier;
use Product\Domain\Produit;

require __DIR__ . '/../../vendor/autoload.php';

$barquetteFraises = new Produit("Barquette de fraises", 5.50);
$gyrophare = new Produit("Gyrophare", 159.99);

$articles = new ProduitsCollection();
$articles->add($barquetteFraises);
$articles->add($gyrophare, 2);

$panier = new Panier($articles);

$panier->afficherContenu();
$panier->afficherTotal();