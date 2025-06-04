<?php

namespace Reservation\Interface;

interface BillableInterface
{
    public function calculateAmount(): float;
}