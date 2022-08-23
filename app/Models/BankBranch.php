<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'branch_name',
        'state_or_division_id',
        'address',
        'phone',
        'fax',
        'remark'
    ];

    protected $casts = [
        'phone' => 'json'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function bankaccounts()
    {
        return $this->hasMany(BankAccount::class);
    }
}
