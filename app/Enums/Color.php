<?php

namespace App\Enums;

enum Color:string
{
    case PRIMARY = 'primary';
    case SECONDARY = 'secondary';
    case DARK = 'dark';
    case LIGHT = 'light';
    case SUCCESS = 'success';
    case DANGER = 'danger';
    case INFO = 'info';
    case WARNING = 'warning';
}
