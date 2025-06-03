<?php

namespace Vehicule\Domain;

use Config\Domain\Notification;
use Vehicule\Collection\EntretienCollection;
use Vehicule\Enum\MarqueEnum;

abstract class AbstractVehicule
{
    public function __construct(
        private MarqueEnum $marque,
        private string $modele,
        private int $annee,
        private int $kilometrage,
        private EntretienCollection $entretiens = new EntretienCollection()
    )
    {

    }

    public function getMarque(): MarqueEnum
    {
        return $this->marque;
    }

    public function getModele(): string
    {
        return $this->modele;
    }

    public function getAnnee(): int
    {
        return $this->annee;
    }

    public function getKilometrage(): int
    {
        return $this->kilometrage;
    }

    public function getEntretiens(): EntretienCollection
    {
        return $this->entretiens;
    }

    /**
     * Retourne la date du dernier entretien effectuer
     * @return ?\DateTime
     */
    public function dernierEntretien(): ?\DateTime
    {
        return $this->entretiens->getLast()?->getDate();
    }

    /**
     * Programmer un entretien du véhicule
     * @param \DateTime $date
     * @return void
     */
    public function programmerEntretien(\DateTime $date): void
    {
        $this->entretiens->add(new Entretien(
            date: $date,
            kilometrage: $this->kilometrage
        ));
    }

    /**
     * Afficher la date du prochain entretien à prevoir
     * @return \DateTime
     */
    public function prochainEntretien(): \DateTime
    {
        $lastEntretien = $this->entretiens->getLast();

        if (is_null($lastEntretien)) {
            return new \DateTime();
        }

        return new \DateTime(date('Y-m-d', strtotime($lastEntretien->getDate()->format('Y-m-d') . ' + 1 month')));
    }

    public function afficherDernierEntretien(): void
    {
        if (is_null($this->dernierEntretien())) {
            Notification::showWarningMessage("Le véhicule n'a fait l'objet d'aucun entretien");
            return;
        }

        Notification::showMessage("Dernier entretien : {$this->dernierEntretien()->format('d/m/Y')}");
    }

    public function afficherProchainEntretien(): void
    {
        Notification::showMessage("Prochain entretien : {$this->prochainEntretien()->format('d/m/Y')}");
    }

    /**
     * Afficher les info
     * @param array $infos
     * @return void
     */
    protected function displayInfos(array $infos): void
    {
        Notification::showTitle($this->getMarque()->name . ' - ' . $this->getModele());
        foreach ($infos as $key => $info) {
            Notification::showMessage($key . ' : ' . $info);
        }
    }

    public function afficherInfos(): void
    {
        $this->displayInfos([
            'marque' => $this->marque->name,
            'modele' => $this->modele,
            'annee' => $this->annee,
            'kilometrage' => $this->kilometrage,
            'nombre entretiens' => $this->entretiens->count(),
        ]);
        $this->entretiens->afficherEntretiens();
    }
}