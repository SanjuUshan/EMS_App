<?php

namespace App\Enums;

enum LeaveStatus: int
{
    case REQUESTING = 1;
    case ACCEPTED = 2;
    case REJECTED = 3;

    public function toString()
    {
        return match ($this) {
            self::REQUESTING => 'Requesting',
            self::ACCEPTED => 'Accepted',
            self::REJECTED => 'Rejected',

            default => 'Unknown'
        };
    }
    public function color()
    {
        return match ($this) {
            self::REQUESTING => Color::WARNING,
            self::ACCEPTED => Color::PRIMARY,
            self::REJECTED => Color::DANGER,


        };
    }
}
