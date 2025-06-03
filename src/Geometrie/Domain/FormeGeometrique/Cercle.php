<?php

namespace Geometrie\Domain\FormeGeometrique;

use Geometrie\Domain\AbstractFormeGeometrique;

class Cercle extends AbstractFormeGeometrique
{
    public function __construct(
        private int $rayon
    )
    {
    }

    public function getRayon(): int
    {
        return $this->rayon;
    }

    public function calculerAire(): float
    {
        return pi() * $this->rayon * $this->rayon;
    }
}