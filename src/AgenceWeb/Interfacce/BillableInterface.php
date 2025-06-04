<?php

namespace AgenceWeb\Interfacce;

interface BillableInterface
{
    public function calculateCost(): float;
}