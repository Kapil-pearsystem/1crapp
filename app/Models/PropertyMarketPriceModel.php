<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyMarketPriceModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_property_market_price';

    protected $primaryKey = 'id';

    protected $fillable = [
        'property_market_id',
        'amount',
        'paid_date',
        'payment_mode',
        'funding_source',
        'transition_proof',
        'seller_receipt',
        'remarks',
        'created_by',
    ];

    // Optional: timestamps are enabled by default
    public $timestamps = true;
}
