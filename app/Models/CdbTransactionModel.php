<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CdbTransactionModel extends Model
{
    protected $table = 'cdb_transactions';

    protected $primaryKey = 'id';

    public $timestamps = false; 
    // ⚠ You only have updated_at, not created_at
    // If you also have created_at, change to true

    protected $fillable = [
        'user_id',
        'txn_id',
        'razorpay_id',
        'razorpay_payment_id',
        'plan_id',
        'amount',
        'plan_type',
        'plan_duration',
        'json_response',
        'receipt_link',
        'payment_mode',
        'user_email',
        'status',
        'created_by',
        'updated_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'json_response' => 'array',
        'status' => 'integer',
        'user_id' => 'integer',
        'plan_id' => 'integer',
    ];
}