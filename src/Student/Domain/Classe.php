<?php

namespace Student\Domain;

use Student\Collection\EtudiantsCollection;

class Classe
{
    public function __construct(
        private EtudiantsCollection $etudiants
    )
    {
    }

    public function getEtudiants(): EtudiantsCollection
    {
        return $this->etudiants;
    }

    public function afficherInformations(): void
    {
        /** @var Etudiant $etudiant */
        foreach ($this->etudiants->getAll() as $etudiant) {
            $etudiant->afficherInformations();
        }
    }
}