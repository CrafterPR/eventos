<?php

namespace App\Enum;

enum EventStatus: string
{
    case DRAFT = "draft";
    case ACTIVE = "active";
    case INACTIVE = "inactive";
    case DELETED = "deleted";
}
