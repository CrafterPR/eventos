<?php

namespace App\Enum;

enum CouponStatus: string
{
    case ACTIVE = "active";
    case INACTIVE = "in_active";
}
