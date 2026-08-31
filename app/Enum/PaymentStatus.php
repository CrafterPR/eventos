<?php

namespace App\Enum;

namespace App\Enum;

enum PaymentStatus: string
{
    case PENDING = "pending";
    case PAID = "paid";
    case APPROVED = "approved";
    case EXPIRED = "expired";
    case RECEIVED_PENDING_APPROVAL = "rpa";
}
