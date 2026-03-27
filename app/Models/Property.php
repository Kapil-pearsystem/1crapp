<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    use HasFactory;
    protected $table = 'tbl_properties';
    public $timestamps = true;
    protected $fillable = ['id', 'title', 'property_type', 'image', 'rent_price', 'cash_flow', 'cap_rate', 'owner', 'basic_purchase_price_requirement', 'basic_purchase_price_actual', 'bpp_criteria_status', 'total_cash_needed_requirement', 'total_cash_needed_actual', 'tcn_criteria_status', 'total_cash_invested_requirement', 'total_cash_invested_actual', 'tci_criteria_status', 'location', 'status', 'created_at', 'updated_at'];
}