<?php

namespace Geometrie\Domain;

class CalculateurAire
{
    private array $formes = array();

    public function add(AbstractFormeGeometrique $formeGeometrique): void
    {
        $this->formes[] = $formeGeometrique;
    }

    public function getFormes(): array
    {
        return $this->formes;
    }

    public function calculerAireTotal(): float
    {
        return array_sum(array_map(function (AbstractFormeGeometrique $formeGeometrique) {
            return $formeGeometrique->calculerAire();
        }, $this->formes));
    }
}