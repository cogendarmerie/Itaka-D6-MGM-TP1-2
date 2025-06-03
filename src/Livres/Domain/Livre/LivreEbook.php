<?php

namespace Livres\Domain\Livre;

use Config\Domain\Notification;
use Livres\Domain\AbstractLivre;
use Livres\Enum\FormatNumeriqueEnum;

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
}