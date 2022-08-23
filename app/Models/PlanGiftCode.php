<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanGiftCode extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = 'plan_gift_codes';
 
    protected $fillable = [
        'gift_card_id',
        'code'
    ];

    public function planGiftCard()
    {
        return $this->belongsTo(PlanGiftCard::class);
    }
}
