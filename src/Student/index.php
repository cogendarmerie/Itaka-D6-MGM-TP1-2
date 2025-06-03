<?php
namespace Student;
require __DIR__ . '/../../vendor/autoload.php';

use Student\Collection\EtudiantsCollection;
use Student\Domain\Classe;
use Student\Domain\Etudiant;

// Création des étudiants
$studentJohn = new Etudiant("DOE", "John");
$studentMatteo = new Etudiant("DOE", "Matteo");
$studentGaetan = new Etudiant("DOE", "Gaetan");

// Résultats aux contrôles
$studentJohn->ajouterNote(10);
$studentJohn->ajouterNote(20);

$studentGaetan->ajouterNote(20);
$studentGaetan->ajouterNote(20);

$studentMatteo->ajouterNote(5);
$studentMatteo->ajouterNote(15);

// Classes
$etudiants = new EtudiantsCollection();
$etudiants->add($studentJohn);
$etudiants->add($studentGaetan);
$etudiants->add($studentMatteo);

$etudiants->delete($studentJohn);

$DFS32a = new Classe($etudiants);
$DFS32a->afficherInformations();