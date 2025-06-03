<?php
namespace Zoo;

use Zoo\Collection\AnimalCollection;
use Zoo\Domain\Animal\Chat;
use Zoo\Domain\Animal\Chien;
use Zoo\Domain\Animal\Oiseau;
use Zoo\Enum\EspeceOiseauEnum;
use Zoo\Enum\RaceChienEnum;

require __DIR__ . '/../../vendor/autoload.php';

$chien = new Chien("Ruby", 4, RaceChienEnum::BERGERALLEMAND);
$chat = new Chat('Mambo', 8, 'noir et blanc');
$pigeon = new Oiseau('None', 3, EspeceOiseauEnum::PIGEON);

$animaux = new AnimalCollection();
$animaux->add($chien);
$animaux->add($chat);
$animaux->add($pigeon);

$animaux->decrire();
$animaux->crier();