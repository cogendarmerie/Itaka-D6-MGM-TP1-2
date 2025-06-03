<?php

namespace Livres\Domain\Livre;

use Config\Domain\Notification;
use Livres\Domain\AbstractLivre;

class LivrePapier extends AbstractLivre
{
    public function __construct(
        string $titre,
        string $auteur,
        int $anneePublication,
        private int $nombrePages,
    )
    {
        parent::__construct($titre, $auteur, $anneePublication);
    }

    public function getNombrePages(): int
    {
        return $this->nombrePages;
    }

    public function afficherDetails(): void
    {
        Notification::showTitle($this->getTitre());
        Notification::showMessage("Auteur : " . $this->getAuteur());
        Notification::showMessage("Année publication : " . $this->getAnneePublication());
        Notification::showMessage("Nombre pages : " . $this->getNombrePages());
    }
}