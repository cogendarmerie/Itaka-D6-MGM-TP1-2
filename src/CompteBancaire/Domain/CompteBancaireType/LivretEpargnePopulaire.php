<?php

namespace CompteBancaire\Domain\CompteBancaireType;

use CompteBancaire\Interface\CompteBancaireTypeInterface;

class LivretEpargnePopulaire implements CompteBancaireTypeInterface
{

    public function getNom(): string
    {
        return 'Livret Epargne Populaire (LEP)';
    }

    public function getPourcentageInteret(): float
    {
        return 1.035;
    }
}