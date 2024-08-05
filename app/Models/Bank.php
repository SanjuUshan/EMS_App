<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    protected $fillable = [
        'bank',
        'bank_branch',
        'account_number',
    ];

    public function employees():HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
