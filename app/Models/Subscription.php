<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'plan_type',
        'plan',
        'product',
        'amount',
        'reference_no',
        'payment_mode'
    ];
}
