<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectricityBillModel extends Model
{
    protected $table = 'rms_electricity_bill';

    protected $fillable = [
        'collection_id',
        'last_reading',
        'current_reading',
        'total_units',
        'unit_rate',
        'electricity_cost',
        'created_by',
    ];

    protected $casts = [
        'last_reading'    => 'decimal:2',
        'current_reading' => 'decimal:2',
        'total_units'     => 'decimal:2',
        'unit_rate'       => 'decimal:4',
        'electricity_cost'=> 'decimal:2',
    ];

    public function collection()
    {
        return $this->belongsTo(
            RentCollectionModel::class,
            'collection_id'
        );
    }
}