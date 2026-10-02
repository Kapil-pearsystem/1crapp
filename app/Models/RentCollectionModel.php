<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RentCollectionModel extends Model
{
    protected $table = 'rms_rentcollection';

    protected $fillable = [
        'tenant_id',
        'shop_id',
        'collection_year',
        'collection_month',
        'basic_rent',
        'electricity_cost',
        'cleaning_cost',
        'other_charge',
        'penalty',
        'gross_due',
        'paid_amount',
        'status',
        'approval_status',
        'approved_by',
        'approved_at',
        'agent_id',
        'payment_mode',
        'reference_number',
        'receipt',
        'remarks',
        'created_by',
    ];

    protected $casts = [
        'collection_year' => 'integer',
        'collection_month' => 'integer',
        'basic_rent'       => 'decimal:2',
        'electricity_cost' => 'decimal:2',
        'cleaning_cost'    => 'decimal:2',
        'other_charge'     => 'decimal:2',
        'penalty'          => 'decimal:2',
        'gross_due'        => 'decimal:2',
        'paid_amount'      => 'decimal:2',
        'approved_at'      => 'datetime',
    ];
}