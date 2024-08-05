<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'nic',
        'file_name',
        'path',
        'desc',
        'status',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
