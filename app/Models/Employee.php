<?php

namespace App\Models;

use App\Enums\Color;
use App\Enums\EmployerType;
use App\Enums\EmployerTypeEnum;
use App\Enums\SectionTypeEnum;
use App\Enums\Status;
use App\Enums\WorkScheduleTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    protected $fillable = [
        'bank_id',
        'section_id',
        'initials',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'nic',
        'gender',
        'civil_status',
        'address',
        'email',
        'mobile',
        'status',
        'emp_type',
        'role',
        'joined_date',
        'file_name',
        'path',
        'password',
    ];

    protected $casts = [
        'role' => EmployerTypeEnum::class,
        'section_type' => SectionTypeEnum::class,
        'work_schedule_type' => WorkScheduleTypeEnum::class,
        'held_types' => 'array',
        // 'price' => 'decimal:2',
        // 'start_at' => 'datetime:H:i:s',
        // 'finish_at' => 'datetime:H:i:s',
        'status' => Status::class,
        'color' => Color::class,
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function leaves():HasMany
    {
        return $this->hasMany(Leave::class, 'emp_id');
    }

    public function salaryEmployee():HasOne
    {
        return $this->hasOne(SalaryEmployee::class, 'emp_id');
    }
    public function payments():HasMany
    {
        return $this->hasMany(Payment::class, 'emp_id');
    }
    public function attendances():HasMany
    {
        return $this->hasMany(Attendance::class, 'emp_id');
    }
    public function inquiries():HasMany
    {
        return $this->hasMany(Inquiry::class, 'emp_id');
    }
}
