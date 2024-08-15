<?php

namespace App\Enum;

enum BoothStatus: string
{
    case PENDING = "pending";
    case ACTIVE = "active";
    case CLOSED = "closed";

    case RESERVED = "reserved";

    case BOOKED = "booked";
    case UNDER_REPAIR = "under_repair";
}
