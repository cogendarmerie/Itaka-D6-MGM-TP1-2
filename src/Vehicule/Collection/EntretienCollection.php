<?php

namespace Vehicule\Collection;

use Config\Domain\Notification;
use Vehicule\Domain\Entretien;

class EntretienCollection
{
    private array $entretiens = array();

    public function add(Entretien $entretien): void
    {
        $this->entretiens[] = $entretien;
    }

    public function getAll(): array
    {
        return $this->entretiens;
    }

    public function getLast(): ?Entretien
    {
        if ($this->count() <= 0) {
            return null;
        }

        return end($this->entretiens) ?? null;
    }

    public function count(): int
    {
        return count($this->entretiens);
    }

    public function afficherEntretiens(): void
    {
        Notification::showTitle("Liste des Entretiens");

        /** @var Entretien $entretien */
        foreach ($this->entretiens as $entretien) {
            Notification::showMessage($entretien);
        }
    }
}