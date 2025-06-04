<?php

namespace Reservation\Enum;

enum ReservationStatusEnum
{
    case PENDING;
    case CONFIRMED;
    case CANCELLED;
    case COMPLETED;
}
