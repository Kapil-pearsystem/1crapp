<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionModel extends Model
{
    protected $table = 'tbl_commission';

    protected $fillable = [
        'passive_profit_id',
        'customer_id',
        'level',
        'commission_percentage',
        'commission_amount',
        'status',
        'created_by',
    ];

    protected $casts = [
        'level' => 'integer',
        'commission_percentage' => 'float',
        'commission_amount' => 'float',
        'status' => 'integer',
    ];

    public $timestamps = true; // Laravel will handle created_at and updated_at
}
