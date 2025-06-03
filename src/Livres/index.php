<?php
namespace Livres;

use Livres\Domain\Livre\LivreEbook;
use Livres\Domain\Livre\LivrePapier;
use Livres\Enum\FormatNumeriqueEnum;
use Student\Domain\Etudiant;

require __DIR__ . '/../../vendor/autoload.php';

$heartstopper = new LivrePapier(
    titre: "Heartstopper Tome 1",
    auteur: "Alice Oseman",
    anneePublication: 2019,
    nombrePages: 272
);

$alexRider = new LivreEbook(
    titre: "Alex Rider",
    auteur: "Anthony Horowitz",
    anneePublication: 2000,
    formatNumerique: FormatNumeriqueEnum::PDF
);

$heartstopper->afficherDetails();
$alexRider->afficherDetails();

$john = new Etudiant(
    nom: 'DOE',
    prenom: 'John',
    notes: array()
);
$matteo = new Etudiant(
    nom: 'BOUDIN',
    prenom: 'Matteo',
    notes: array()
);

$alexRider->emprunter($john);
$heartstopper->emprunter($matteo);
$heartstopper->emprunter($john);

$heartstopper->retourner();
$heartstopper->emprunter($john);