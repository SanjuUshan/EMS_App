<?php

namespace App\Enums;

enum WorkScheduleTypeEnum: int
{
    case DAY = 1;
    case NIGHT = 2;
    case SHIFT = 3;



    public function toString()
    {
        return match ($this) {
            self::DAY => 'Day',
            self::NIGHT => 'Night',
            self::SHIFT => 'Shift',

            default => 'Unknown'
        };
    }

    public function color()
    {
        return match ($this) {
            self::DAY => Color::PRIMARY,
            self::NIGHT => Color::SECONDARY,
            self::SHIFT => Color::WARNING,

        };
    }
}
