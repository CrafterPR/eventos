<?php

namespace App\Enum;

enum PurchaseOrderStatus: string
{
    case NEW = "new";
    case PAID = "paid";
    case CANCELLED = "cancelled";
    case FAILED = "failed";

    public function label(): string
    {
        return match ($this) {
            self::NEW => 'Pending',
            self::PAID => 'Paid',
            self::CANCELLED => 'Cancelled',
            self::FAILED => 'Failed',
        };
    }
}
