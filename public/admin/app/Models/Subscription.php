<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    use HasFactory;
    protected $table = 'subscriptions';
    protected $fillable = ['id', 'user_id', 'plan', 'product', 'amount', 'reference_no', 'payment_mode', 'created_at', 'updated_at'];
    public $timestamps = true; 
}