<?php

namespace App\Macros;

use App\Macros\LivewireMacros;
use App\Macros\CollectionMacros;
use App\macros\QueueCustomMacros;
use App\macros\BlueprintCustomMacros;
use App\macros\FilesystemCustomMacros;
use Illuminate\Support\Str;

class CustomMacros
{
    private $maros = [
        // BlueprintCustomMacros::class,
        LivewireMacros::class,
        // CollectionMacros::class,
        // FilesystemCustomMacros::class,
        // QueueCustomMacros::class,
    ];


    public static function init()
    {
        foreach ((new self)->maros as $class) {
            (new $class)();
        }

        Str::macro('isUnicode', fn ($value) => mb_detect_encoding($value) == 'UTF-8');
    }
}
