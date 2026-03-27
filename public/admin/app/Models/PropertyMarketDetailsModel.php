<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyMarketDetailsModel extends Model
{
    protected $table = 'propertymarket_details';

    protected $fillable = [
        'property_market_id',
        'date_of_booking', 'date_of_registry', 'date_of_possession',
        'gross_payment', 'parking', 'no_of_parking', 'category_type',
        'property_size', 'property_size_type', 'property_unit',
        'bedrooms', 'bathrooms', 'built_year', 'transaction_type',
        'prop_unit', 'tower_no', 'building_name', 'street_no',
        'prop_country', 'prop_state', 'prop_city', 'prop_zip_code',
        'prop_google_location', 'seller_name', 'seller_street_name',
        'seller_country_id', 'seller_state_id', 'seller_city_id',
        'seller_zip_code', 'seller_phone', 'seller_email',
        'agent_name', 'agent_street_name', 'agent_country_id',
        'agent_state_id', 'agent_city_id', 'agent_zip_code',
        'agent_phone', 'agent_email', 'current_market_value', 'current_debt_balance', 'annual_cash_flow',
    ];
    public function property()
    {
        return $this->belongsTo(PropertyMarketModel::class, 'property_market_id', 'id');
    }
    
}
?>
