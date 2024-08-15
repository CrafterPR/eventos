<?php

namespace App\Enum;

enum OrderStatus: string
{
    case PENDING = "pending";
    case SETTLED = "settled";
    case RAISED = "raised";
    case EXPIRED = "expired";
}
