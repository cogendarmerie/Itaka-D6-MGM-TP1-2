<?php
namespace Geometrie;

use Config\Domain\Notification;
use Geometrie\Domain\CalculateurAire;
use Geometrie\Domain\FormeGeometrique\Cercle;
use Geometrie\Domain\FormeGeometrique\Rectangle;
use Geometrie\Domain\FormeGeometrique\Triangle;

require __DIR__ . '/../../vendor/autoload.php';

$cercle = new Cercle(10);
$rectangle = new Rectangle(10, 20);
$triangle = new Triangle(20);

$calculateur = new CalculateurAire();
$calculateur->add($cercle);
$calculateur->add($rectangle);
$calculateur->add($triangle);

Notification::showMessage($calculateur->calculerAireTotal());