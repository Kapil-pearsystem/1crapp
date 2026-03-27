<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PassiveProfitModel extends Model
{
    protected $table = 'tbl_passive_profit';

    protected $fillable = [
        'property_id',
        'amount',
        'max_commission_percentage',
        'total_commission_amount',
        'status',
        'created_by',
    ];

    protected $casts = [
        'amount' => 'float',
        'max_commission_percentage' => 'float',
        'total_commission_amount' => 'float',
        'status' => 'integer',
    ];
}
