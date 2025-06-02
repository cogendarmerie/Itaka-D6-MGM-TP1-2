<?php

namespace Student\Collection;

use Student\Domain\Etudiant;

class EtudiantsCollection
{
    private array $etudiants = [];

    public function add(Etudiant $etudiant): void
    {
        $this->etudiants[] = $etudiant;
    }

    public function getAll(): array
    {
        return $this->etudiants;
    }

    public function get(int $index): ?Etudiant
    {
        return $this->etudiants[$index] ?? null;
    }

    public function count(): int
    {
        return count($this->etudiants);
    }
}