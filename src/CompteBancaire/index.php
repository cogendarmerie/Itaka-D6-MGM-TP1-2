<?php
namespace CompteBancaire;
use CompteBancaire\Domain\CompteBancaire;
use CompteBancaire\Domain\CompteBancaireType\LivretA;

require __DIR__ . '/../../vendor/autoload.php';

$compteBancaire = new CompteBancaire(100000, "John DOE", new LivretA());

$compteBancaire->retrait(1000);
$compteBancaire->depot(100);
$compteBancaire->retrait(578);

echo "Interet : " . $compteBancaire->calculerInteret() . PHP_EOL;
$compteBancaire->afficherSolde();