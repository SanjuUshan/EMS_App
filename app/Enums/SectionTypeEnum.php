<?php

namespace App\Enums;

enum SectionTypeEnum: int
{
    case CLEANING = 1;
    case KITCHEN = 2;
    case CUSTOMER_SUPPORT = 3;

    public function toString()
    {
        return match ($this) {
            self::CLEANING => 'Cleaning',
            self::KITCHEN => 'Kitchen',
            self::CUSTOMER_SUPPORT => 'Customer Support',

            default => 'Unknown'
        };
    }
    public function color()
    {
        return match ($this) {
            self::CLEANING => Color::SUCCESS,
            self::KITCHEN => Color::SECONDARY,
            self::CUSTOMER_SUPPORT => Color::WARNING,

        };
    }
}
