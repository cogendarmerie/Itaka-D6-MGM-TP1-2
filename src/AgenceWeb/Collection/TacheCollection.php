<?php

namespace AgenceWeb\Collection;

use AgenceWeb\Domain\AbstractTache;

class TacheCollection
{
    private array $taches = [];

    public function add(AbstractTache $tache): void
    {
        $this->taches[] = $tache;
    }

    public function getAll(): array
    {
        return $this->taches;
    }

    public function get(int $index): ?AbstractTache
    {
        return $this->taches[$index] ?? null;
    }

    public function count(): int
    {
        return count($this->taches);
    }
}