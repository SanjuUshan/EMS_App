<?php

namespace App\Enums;

enum EmploymentTypeEnum: int
{
    case FULL_TIME = 1;
    case PART_TIME = 2;
    case TEMPORARY = 3;



    public function toString()
    {
        return match ($this) {
            self::FULL_TIME => 'Full Time',
            self::PART_TIME => 'Part Time',
            self::TEMPORARY => 'Temporary',

            default => 'Unknown'
        };
    }

    public function color()
    {
        return match ($this) {
            self::FULL_TIME => Color::SUCCESS,
            self::PART_TIME => Color::SECONDARY,
            self::TEMPORARY => Color::WARNING,
            
        };
    }
}
