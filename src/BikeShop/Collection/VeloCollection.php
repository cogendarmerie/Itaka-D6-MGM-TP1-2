<?php

namespace BikeShop\Collection;

use BikeShop\Domain\AbstractVelo;

class VeloCollection
{
    private array $velos = array();

    public function add(AbstractVelo $velo): void
    {
        $this->velos[] = $velo;
    }

    public function getAll(): array
    {
        return $this->velos;
    }

    public function get(int $index): ?AbstractVelo
    {
        return $this->velos[$index] ?? null;
    }

    public function count(): int
    {
        return count($this->velos);
    }
}