<?php

namespace PVe\Collection;

use PVe\Domain\AbstractProcesVerbal;

class ProcesVerbalCollection
{
    private array $procesVerbals = array();

    public function add(AbstractProcesVerbal $procesVerbal): void
    {
        $this->procesVerbals[] = $procesVerbal;
    }

    public function getAll(): array
    {
        return $this->procesVerbals;
    }

    public function count(): int
    {
        return count($this->procesVerbals);
    }
}