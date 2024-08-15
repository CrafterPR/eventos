<?php

namespace App\Enum;

enum BookingConfirmationStatus: string
{
    case PENDING = "pending";
    case UNDER_REVIEW = "under_review";
    case CONFIRMED = "confirmed";
    case REJECTED = "rejected";
}
