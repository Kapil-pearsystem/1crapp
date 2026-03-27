<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyMarketModel extends Model
{

    use HasFactory;
    protected $table = 'propertymarkets';
    protected $fillable = ['id', 'user_id', 'property', 'owner_name', 'owner_belong', 'property_type', 'project_name', 'location', 'feedback', 'current_status', 'status', 'market_status', 'created_at', 'updated_at', 'posted_by'];
    public $timestamps = true; 
    
    public function details()
    {
        return $this->hasOne(PropertyMarketDetailsModel::class, 'property_market_id', 'id');
        // 'property_market_id' is the foreign key in the details table
    }

    public function documents()
    {
        return $this->hasMany(PropertyMarketDoc::class, 'propertymarket_id', 'id');
        // 'propertymarket_id' is the foreign key in the docs table
    }
    public function payments()
    {
    return $this->hasMany(PropertyMarketPriceModel::class, 'property_market_id', 'id');
    }
}