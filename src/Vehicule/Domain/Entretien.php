<?php

namespace Vehicule\Domain;

class Entretien
{
    public function __construct(
        private readonly \DateTime $date,
        private readonly int $kilometrage
    )
    {
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getKilometrage(): int
    {
        return $this->kilometrage;
    }

    public function __toString(): string
    {
        return "{$this->getDate()->format('d/m/Y')} - {$this->getKilometrage()} km";
    }
}