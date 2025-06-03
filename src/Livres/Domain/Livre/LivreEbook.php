<?php

namespace Livres\Domain\Livre;

use Config\Domain\Notification;
use Livres\Domain\AbstractLivre;
use Livres\Enum\FormatNumeriqueEnum;
use Student\Domain\Etudiant;

class LivreEbook extends AbstractLivre
{
    public function __construct(
        string $titre,
        string $auteur,
        int $anneePublication,
        private FormatNumeriqueEnum $formatNumerique
    )
    {
        parent::__construct($titre, $auteur, $anneePublication);
    }

    public function getFormatNumerique(): FormatNumeriqueEnum
    {
        return $this->formatNumerique;
    }

    public function afficherDetails(): void
    {
        Notification::showTitle($this->getTitre());
        Notification::showMessage("Auteur : " . $this->getAuteur());
        Notification::showMessage("Année publication : " . $this->getAnneePublication());
        Notification::showMessage("Format : " . $this->getFormatNumerique()->name);
    }

    public function emprunter(Etudiant $emprunteur): void
    {
        Notification::showWarningMessage("Livre {$this->getTitre()} au format numérique - Pas d'emprunt possible");
    }

    public function retourner(): void
    {
        Notification::showErrorMessage("Livre Ebook - Aucun retour");
    }
}