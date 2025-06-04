<?php

namespace Reservation\Domain;

use Reservation\Collection\ReservationCollection;
use Reservation\Enum\ReservationStatusEnum;
use Reservation\Enum\RoomTypeEnum;

class Room
{
    public function __construct(
        private int $id,
        private string $number,
        private RoomTypeEnum $type,
        private float $pricePerNight
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getType(): RoomTypeEnum
    {
        return $this->type;
    }

    public function getPricePerNight(): float
    {
        return $this->pricePerNight;
    }

    public function isSame(Room $room): bool
    {
        return $this->id === $room->getId();
    }
}