<?php

namespace App\Enum;

enum BookingStatus: string
{
    case AVAILABLE = "available"; // Booths 1 - 61, #0A7873 / Booths (62 - 102) #F3F3F3

    case PENDING = "pending"; #D3CEBC
    case RESERVED = "reserved";  #75672D
    case BOOKED = "booked";    #38AF8F
    case EXPIRED = "expired";   #Not displayed anywhere in the app but used by cron job


}
