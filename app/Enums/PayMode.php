<?php

namespace App\Enums;

enum PayMode: int
{
    case CASH = 1;
    case BANK_TRANSFER = 2;

    public function toString()
    {
        return match ($this) {
            self::CASH => 'Cash',
            self::BANK_TRANSFER => 'Bank Transfer',

            default => 'Unknown'
        };
    }
    public function color()
    {
        return match ($this) {
            self::CASH => Color::SUCCESS,
            self::BANK_TRANSFER => Color::WARNING,

        };
    }
}
