<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanGiftCard extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = 'plan_gift_cards';
 
    protected $fillable = [
        'name',
        'month',
        'image',
    ];

    public function planGiftCodes()
    {
        return $this->hasMany(PlanGiftCode::class);
    }
}
