<?php

namespace Geometrie\Domain\FormeGeometrique;

use Geometrie\Domain\AbstractFormeGeometrique;

class Triangle extends AbstractFormeGeometrique
{
    public function __construct(
        private int $longeurCote
    )
    {
    }

    public function getLongeurCote(): int
    {
        return $this->longeurCote;
    }

    public function calculerAire(): float
    {
        return (pow($this->longeurCote, 2) * sqrt(3)) / 4;
    }
}