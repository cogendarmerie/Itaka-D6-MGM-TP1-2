<?php

namespace Reservation\Domain;

use Reservation\Enum\ReservationStatusEnum;
use Reservation\Interface\BillableInterface;

class Reservation implements BillableInterface
{
    public function __construct(
        private int $id,
        private Room $room,
        private Client $client,
        private \DateTime $startDate,
        private \DateTime $endDate,
        private ReservationStatusEnum $status
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRoom(): Room
    {
        return $this->room;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    public function getStatus(): ReservationStatusEnum
    {
        return $this->status;
    }

    public function getDurationInNights(): int
    {
        $interval = $this->startDate->diff($this->endDate);
        return $interval->days;
    }

    public function cancel(): void
    {
        if ($this->status === ReservationStatusEnum::CONFIRMED) {
            $this->status = ReservationStatusEnum::CANCELLED;
        } else {
            throw new \Exception("Cannot cancel a reservation that is not confirmed.");
        }
    }

    public function calculateAmount(): float
    {
        return $this->getDurationInNights() * $this->room->getPricePerNight();
    }
}