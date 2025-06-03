<?php

namespace Student\Domain;
use Config\Domain\Notification;

class Etudiant
{

    public function __construct(
        private string $nom,
        private string $prenom,
        private array $notes = array()
    )
    {
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getNotes(): array
    {
        return $this->notes;
    }

    public function ajouterNote(int $note): void
    {
        $this->notes[] = $note;
    }

    /**
     * Calculer la moyenne de note de l'étudiant
     * @return float
     */
    public function calculerMoyenne(): float
    {
        $moyenne = 0;

        foreach ($this->notes as $note) {
            $moyenne += $note;
        }

        return $moyenne / count($this->notes);
    }

    public function afficherInformations(): void
    {
        Notification::showMessage($this->nom . " " . $this->prenom . " | Moyenne : " . $this->calculerMoyenne());
    }

    public function isSame(Etudiant $etudiant): bool
    {
        return $etudiant->getNom() === $this->nom && $etudiant->getPrenom() === $this->prenom;
    }
}