<?php

namespace Reservation\Domain;

use Reservation\Collection\ReservationCollection;

class Client
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email,
        ReservationCollection $reservations = new ReservationCollection()
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function isSame(Client $client): bool
    {
        return $this->id === $client->getId();
    }
}