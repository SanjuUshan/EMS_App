<?php

namespace App\Enums;

enum AttendanceStatusEnum: int
{
    case CHECK_IN = 1;
    case CHECK_OUT = 2;
    case ABCENSE = 3;
    case LEAVE = 4;

    public function toString()
    {
        return match ($this) {
            self::CHECK_IN => 'Check In',
            self::CHECK_OUT => 'Check Out',
            self::ABCENSE => 'Abcense',
            self::LEAVE => 'Leave',

            default => 'Unknown'
        };
    }
    public function color()
    {
        return match ($this) {
            self::CHECK_IN => Color::SUCCESS,
            self::CHECK_OUT => Color::WARNING,
            self::ABCENSE => Color::DANGER,
            self::LEAVE => Color::PRIMARY,

        };
    }
}
