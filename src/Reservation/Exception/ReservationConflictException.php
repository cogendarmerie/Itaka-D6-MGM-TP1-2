<?php

namespace Reservation\Exception;

use Reservation\Domain\Room;

class ReservationConflictException extends \RuntimeException
{
    public function __construct(string $message = "Cette chambre n'est pas disponible pour la période demandée", int $code = 0, ?Throwable $previous = null, ?Room $room = null)
    {
        if ($room) {
            $message = sprintf('La chambre %s n\'est pas disponible pour la période demandée', $room->getNumber());
        }

        parent::__construct($message, $code, $previous);
    }
}