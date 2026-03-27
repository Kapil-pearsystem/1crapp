<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDescription extends Model
{

    use HasFactory;
    protected $table = 'property_description';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'prop_id',
        'desc_type',
        'bedrooms',
        'bathrooms',
        'desc_year',
        'desc_parking',
        'no_of_parking',
        'desc_lot',
        'desc_zoning',
        'desc_mlsn',
        'desc_category',
        'desc_category_type',
        'desc_lot_type',
        'desc_status',
        'desc_transaction',
        'created_at',
        'updated_at'

    ];
}