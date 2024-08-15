<?php

namespace App\Enum;

enum VotingPeriodStatus: string
{
    case OPEN = "Open";
    case CLOSED = "Closed";
    case SUSPENDED = "Suspended";
}
