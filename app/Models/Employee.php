<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'photo',
    ];

    protected $casts = [
        'phone_number' => 'array',
    ];

    public function bankaccount()
    {
        return $this->hasMany(BankAccount::class);
    }
}
