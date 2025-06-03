<?php

namespace Ecommerce\Collection;

use Ecommerce\Domain\AbstractPaiement;

class PaiementCollection
{
    private array $paiements = array();

    public function add(AbstractPaiement $paiement): void
    {
        $this->paiements[] = $paiement;
    }

    public function getAll(): array
    {
        return $this->paiements;
    }

    public function count(): int
    {
        return count($this->paiements);
    }

    public function process(): void
    {
        /** @var AbstractPaiement $paiement */
        foreach ($this->paiements as $paiement) {
            $paiement->process();
        }
    }
}