<?php

namespace App\Enums;

enum PaymentStatus: int
{
    case PAID = 1;
    case UNPAID = 2;

    public function toString()
    {
        return match ($this) {
            self::PAID => 'Paid',
            self::UNPAID => 'Unpaid',

            default => 'Unknown'
        };
    }
    public function color()
    {
        return match ($this) {
            self::PAID => Color::SUCCESS,
            self::UNPAID => Color::WARNING,

        };
    }
}
