<?php

namespace App\Models;

use App\Enums\SectionTypeEnum;
use App\Enums\Status;
use App\Enums\WorkScheduleTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    protected $fillable = [
        'section',
        'employment_type',
        'work_schedule',
        'supervisor',
    ];

    protected $casts = [
        'section_type' => SectionTypeEnum::class,
        'work_schedule' => WorkScheduleTypeEnum::class,
        'held_types' => 'array',
        'price' => 'decimal:2',
        'start_at' => 'datetime:H:i:s',
        'finish_at' => 'datetime:H:i:s',
        'status' => Status::class,
        
    ];
    public function employees():HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
