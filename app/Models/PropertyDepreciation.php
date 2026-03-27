<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDepreciation extends Model
{
    protected $table = 'property_depreciations';

    protected $fillable = [
        'prop_id',
        'depreciation_period',
        'land_value_type',
        'land_value_amount',
        'land_value_percent',
        'land_value_percent_of',
        'tax_rate',
    ];
}
