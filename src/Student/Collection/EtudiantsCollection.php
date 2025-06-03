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

    public function delete(Etudiant $deletedStudent): void
    {
        for ($i = 0; $i < count($this->etudiants); $i++) {
            if ($this->etudiants[$i]->isSame($deletedStudent)) {
                unset($this->etudiants[$i]);
            }
        }
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