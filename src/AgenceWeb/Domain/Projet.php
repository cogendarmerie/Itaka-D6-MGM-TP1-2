<?php

namespace AgenceWeb\Domain;

use AgenceWeb\Collection\TacheCollection;
use AgenceWeb\Interfacce\BillableInterface;

class Projet
{
    public function __construct(
        private string $nom,
        private Client $client,
        private TacheCollection $taches,
        private \DateTime $dateDebut,
        private ?\DateTime $dateFin = null
    )
    {
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function getTaches(): TacheCollection
    {
        return $this->taches;
    }

    public function getDateDebut(): \DateTime
    {
        return $this->dateDebut;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    /**
     * Retourne l'avancement du projet en pourcentage.
     * @return int
     */
    public function getAvancement(): int
    {
        $totalTaches = $this->taches->count();
        if ($totalTaches === 0) {
            return 100;
        }

        $tachesTerminees = array_filter($this->taches->getAll(), function ($tache) {
            return $tache->isTerminee();
        });

        $pourcentage = (count($tachesTerminees) / $totalTaches) * 100;

        return (int)$pourcentage;
    }

    /**
     * Calculer le cout du projet
     */
    public function calculerCout(): float
    {
        $coutTotal = 0;

        foreach ($this->taches->getAll() as $tache) {
            if ($tache instanceof BillableInterface) {
                $coutTotal += $tache->calculateCost();
            }
        }

        return $coutTotal;
    }
}