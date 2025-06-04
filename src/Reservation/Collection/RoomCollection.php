<?php

namespace Reservation\Collection;

use Reservation\Domain\Room;

class RoomCollection
{
    private array $rooms = [];

    public function add(Room $room): void
    {
        $this->rooms[] = $room;
    }

    public function getAll(): array
    {
        return $this->rooms;
    }

    public function getById(int $id): ?Room
    {
        foreach ($this->rooms as $room) {
            if ($room->getId() === $id) {
                return $room;
            }
        }
        return null;
    }

    /**
     * Donne la liste des chambres disponibles dans une période donnée.
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param ReservationCollection $reservations
     * @return bool
     */
    public function getAvailableRooms(\DateTime $startDate, \DateTime $endDate, ReservationCollection $reservations): array
    {
        $availableRooms = [];

        foreach ($this->rooms as $room) {
            if ($reservations->isAvailable($startDate, $endDate, $room)) {
                $availableRooms[] = $room;
            }
        }

        return $availableRooms;
    }
}