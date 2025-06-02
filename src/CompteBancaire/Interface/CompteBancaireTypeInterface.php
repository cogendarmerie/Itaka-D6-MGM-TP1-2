<?php

namespace CompteBancaire\Interface;

interface CompteBancaireTypeInterface
{
    public function getNom(): string;
    public function getPourcentageInteret(): float;
}