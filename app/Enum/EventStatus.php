<?php

namespace App\Enum;

enum EventStatus: string
{
    case DRAFT = "draft";
    case ACTIVE = "active";
    case IN_ACTIVE = "in_active";
    case DELETED = "deleted";
}
