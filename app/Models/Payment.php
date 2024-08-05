<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use App\Enums\PayMode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'emp_id',
        'basic_salary',
        'pay_amount',
        'deduction_amount',
        'pay_date',
        'tax',
        'epf',
        // 'etf',
        'bonus_amount',
        'ot_amount',
        'pay_mode',
        'status',
    ];

    protected $casts = [
        'status' => PaymentStatus::class,
        'pay_mode' => PayMode::class,
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'emp_id');
    }
}
