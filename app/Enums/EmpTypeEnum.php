<?php

namespace App\Enums;

enum EmpTypeEnum: int
{
    case EMPLOYEE = 1;
    case SUPERVISOR = 2;

    public function toString()
    {
        return match ($this) {
            self::EMPLOYEE => 'Employee',
            self::SUPERVISOR => 'Supervisor',

            default => 'Unknown'
        };
    }
    public function color()
    {
        return match ($this) {
            self::EMPLOYEE => Color::SUCCESS,
            self::SUPERVISOR => Color::WARNING,

        };
    }
}
