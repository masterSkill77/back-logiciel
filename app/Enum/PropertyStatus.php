<?php


namespace App\Enum;

enum PropertyStatus  : string
{
    case INACTIVE = "inactive";
    case ACTIVE = "active";
    case SOLD = "sold";
    case ARCHIVE = "archive";
 }