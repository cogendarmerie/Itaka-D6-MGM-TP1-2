<?php

namespace Vehicule\Collection;

use Config\Domain\Notification;
use Vehicule\Domain\AbstractChargement;

class ChargementCollection
{
    private array $chargements = [];

    public function add(AbstractChargement $chargement): void
    {
        $this->chargements[] = $chargement;
    }

    public function getAll(): array
    {
        return $this->chargements;
    }

    public function count(): int
    {
        return count($this->chargements);
    }

    public function getPoidsTotal(): int
    {
        return array_sum(array_map(function (AbstractChargement $chargement) {
            return $chargement->getPoids();
        }, $this->chargements));
    }

    public function afficherChargements(): void
    {
        Notification::showTitle("Contenu du chargement");

        /** @var AbstractChargement $chargement */
        foreach ($this->chargements as $chargement) {
            Notification::showMessage($chargement);
        }
    }
}