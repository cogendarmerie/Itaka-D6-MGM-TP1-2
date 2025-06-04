<?php

namespace AgenceWeb\Domain;

use AgenceWeb\Interfacce\BillableInterface;

abstract class AbstractTool implements BillableInterface
{
    public function __construct(
        private string $name,
        private int $price
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function calculateCost(): float
    {
        return $this->getPrice();
    }
}