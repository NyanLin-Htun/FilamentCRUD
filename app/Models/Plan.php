<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'plans';

    protected $fillable = [
        'slug',
        'name',
        'description',
        'is_active',
        'is_hidden',
        'price',
        'currency',
        'plan_type',
    ];
}
