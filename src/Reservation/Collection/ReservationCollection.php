<?php

namespace Reservation\Collection;

use Reservation\Domain\Client;
use Reservation\Domain\Reservation;
use Reservation\Domain\Room;
use Reservation\Enum\ReservationStatusEnum;
use Reservation\Exception\ReservationConflictException;

class ReservationCollection
{
    private array $reservations = [];

    public function add(Reservation $reservation): void
    {
        if ($this->isAvailable($reservation->getStartDate(), $reservation->getEndDate(), $reservation->getRoom())) {
            $this->reservations[] = $reservation;
        } else {
            throw new ReservationConflictException(room: $reservation->getRoom());
        }
    }

    public function getAll(): array
    {
        return $this->reservations;
    }

    public function getAllByStatus(ReservationStatusEnum $status): array
    {
        return array_filter($this->reservations, function (Reservation $reservation) use ($status) {
            return $reservation->getStatus() === $status;
        });
    }

    public function getAllByClient(Client $client): array
    {
        return array_filter($this->reservations, function (Reservation $reservation) use ($client) {
            return $reservation->getClient()->isSame($client);
        });
    }

    public function getByRoom(Room $room): array
    {
        return array_filter($this->reservations, function (Reservation $reservation) use ($room) {
            return $reservation->getRoom()->isSame($room);
        });
    }

    public function isAvailable(\DateTime $startDate, \DateTime $endDate, Room $room): bool
    {
        foreach ($this->getByRoom($room) as $reservation) {
            if ($reservation->getStartDate() < $endDate && $reservation->getEndDate() > $startDate) {
                return false;
            }
        }
        return true;
    }

    public function calculateTotalAmount(\DateTime $month): float
    {
        $total = 0;

        /** @var Reservation $reservation */
        foreach ($this->reservations as $reservation) {
            if ($reservation->getStartDate()->format('Y-m') === $month->format('Y-m')) {
                $total += $reservation->calculateAmount();
            }
        }

        return $total;
    }

    public function get(int $index): ?Reservation
    {
        return $this->reservations[$index] ?? null;
    }

    public function count(): int
    {
        return count($this->reservations);
    }
}