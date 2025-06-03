<?php

namespace Vehicule\Domain;

abstract class AbstractChargement
{
    public function __construct(
        private readonly string $description,
        private readonly int $poids
    )
    {
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPoids(): int
    {
        return $this->poids;
    }
}