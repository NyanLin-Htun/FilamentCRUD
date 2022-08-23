<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'bank_branch_id',
        'bank_account_no'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function bankbranch()
    {
        return $this->belongsTo(Bankbranch::class);
    }
}
