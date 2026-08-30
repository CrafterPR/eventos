<?php

namespace App\Enum;

enum PurchaseOrderStatus: string
{
    case PENDING = "pending";
    case SETTLED = "settled";
    case RAISED = "raised";
    case EXPIRED = "expired";
}
