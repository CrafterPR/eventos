<?php

namespace App\Enum;

enum PurchaseOrderStatus: string
{
    case NEW = "new";
    case PAID = "paid";
    case CANCELLED = "cancelled";
    case FAILED = "failed";
}
