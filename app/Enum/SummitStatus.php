<?php

namespace App\Enum;

enum SummitStatus: string
{
    case DRAFT = "draft";
    case ACTIVE = "active";
    case IN_ACTIVE = "in_active";
    case DELETED = "deleted";
}
