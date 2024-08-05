<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'emp_id',
        'check_in',
        'check_out',
        'date',
        'status',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
