<?php

namespace App\Models;

use App\Enums\LeaveStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Leave extends Model
{
    protected $fillable = [
        'emp_id',
        'start_date',
        'end_date',
        'reason',
        'status',
    ];

    protected $casts = [
        'status' => LeaveStatus::class,
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
