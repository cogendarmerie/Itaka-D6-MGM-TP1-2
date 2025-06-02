<?php

namespace BikeShop\Collection;

use BikeShop\Domain\AbstractAccessoire;

class AccessoiresCollection
{
    private array $accessoires = [];

    public function add(AbstractAccessoire $accessoire): void
    {
        $this->accessoires[] = $accessoire;
    }

    public function getAll(): array
    {
        return $this->accessoires;
    }

    public function get(int $index): ?AbstractAccessoire
    {
        return $this->accessoires[$index] ?? null;
    }

    public function count(): int
    {
        return count($this->accessoires);
    }
}