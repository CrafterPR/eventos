<?php

namespace App\Enum;

enum UserType: string
{
    case STAFF = "staff";
    case DELEGATE = "delegate";
    case EXHIBITOR = "exhibitor";
}
