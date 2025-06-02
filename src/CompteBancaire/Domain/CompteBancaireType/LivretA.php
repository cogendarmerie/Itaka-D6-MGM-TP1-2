<?php

namespace CompteBancaire\Domain\CompteBancaireType;

use CompteBancaire\Interface\CompteBancaireTypeInterface;

class LivretA implements CompteBancaireTypeInterface
{

    public function getNom(): string
    {
        return 'Livret A';
    }

    public function getPourcentageInteret(): float
    {
        return 1.024;
    }
}