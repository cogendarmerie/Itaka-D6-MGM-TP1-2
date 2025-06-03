<?php

namespace PVe\Domain;

use Ecommerce\Domain\AbstractPaiement;
use http\Exception\InvalidArgumentException;
use PVe\Collection\ProcesVerbalCollection;

class AvisContravention
{
    public function __construct(
        private ProcesVerbalCollection $procesVerbaux
    )
    {
    }

    public function getProcesVerbaux(): ProcesVerbalCollection
    {
        return $this->procesVerbaux;
    }

    public function getMontant(): int
    {
        return array_sum(array_map(function (AbstractProcesVerbal $procesVerbal) {
            return $procesVerbal->getMontant();
        }, $this->getProcesVerbaux()->getAll()));
    }

    public function encaisser(string $methode): void
    {
        $paiement = new $methode($this->getMontant());

        if (!$paiement instanceof AbstractPaiement) {
            throw new InvalidArgumentException(sprintf("%s attendu, %s fournit", AbstractPaiement::class, $methode));
        }

        $paiement->process();
    }
}