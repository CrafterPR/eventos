<?php

namespace App\Enum;

enum PaymentStatus: string
{
    case PENDING = "pending";
    case SETTLED = "settled";
    case APPROVED = "approved";
    case EXPIRED = "expired";
    case RECEIVED_PENDING_APPROVAL = "rpa";
}
