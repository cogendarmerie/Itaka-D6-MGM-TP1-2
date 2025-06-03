<?php

namespace Livres\Domain;

use Config\Domain\Notification;
use Config\Enum\TerminalColorEnum;
use Student\Domain\Etudiant;

abstract class AbstractLivre
{

    public function __construct(
        private string $titre,
        private string $auteur,
        private int $anneePublication,
        private ?Etudiant $emprunteurActuel = null,
    )
    {
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function getAnneePublication(): int
    {
        return $this->anneePublication;
    }

    public function getEmprunteurActuel(): ?Etudiant
    {
        return $this->emprunteurActuel;
    }

    public function isAvailable(): bool
    {
        return $this->emprunteurActuel === null;
    }

    /**
     * Afficher le détails d'un livre
     * @return void
     */
    public function afficherDetails(): void
    {
        Notification::showMessage("{$this->titre} - {$this->auteur} - {$this->anneePublication}");
    }

    /**
     * Emprunter le livre
     * @param Etudiant $emprunteur
     * @return void
     */
    public function emprunter(Etudiant $emprunteur): void
    {
        if (!$this->isAvailable()) {
            Notification::showErrorMessage("Le livre {$this->titre} n'est pas disponible");
            return;
        }

        $this->emprunteurActuel = $emprunteur;
        Notification::showSuccessMessage("Le livre à été préter à {$emprunteur->getPrenom()} {$emprunteur->getNom()}");
    }

    /**
     * Retourner le livre
     * @return void
     */
    public function retourner(): void
    {
        $this->emprunteurActuel = null;
        Notification::showSuccessMessage("Le livre à bien été rendue");
    }
}