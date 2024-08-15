<?php

namespace App\Enum;

enum OrderItemStatus: string
{
    case PENDING = "pending";
    case RAISED = "raised";
    case PAID = "paid";
    case APPROVED = "approved";
    case CANCELLED = "cancelled";
}
