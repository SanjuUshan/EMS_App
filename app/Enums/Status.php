<?php

namespace App\Enums;

enum Status: int
{
    case ACTIVE = 1;
    case FIRED = 2;

    public function toString()
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::FIRED => 'Fired',

            default => 'Unknown'
        };
    }
    public function color()
    {
        return match ($this) {
            self::ACTIVE => Color::PRIMARY,
            self::FIRED => Color::DANGER,
            

        };
    }
}
