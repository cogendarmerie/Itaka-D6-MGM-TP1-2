<?php

namespace Geometrie\Domain\FormeGeometrique;

use Geometrie\Domain\AbstractFormeGeometrique;

class Rectangle extends AbstractFormeGeometrique
{
    public function __construct(
        private int $largeur,
        private int $hauteur
    )
    {
    }

    public function getLargeur(): int
    {
        return $this->largeur;
    }

    public function getHauteur(): int
    {
        return $this->hauteur;
    }

    public function calculerAire(): float
    {
        return $this->largeur * $this->hauteur;
    }
}