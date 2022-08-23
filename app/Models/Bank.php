<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'address',
        'phone',
        'fax',
        'remark'
    ];

    protected $casts = [
        'phone' => 'json'
    ];

    public function bankbranches()
    {
        return $this->hasMany(BankBranch::class);
    }
}
