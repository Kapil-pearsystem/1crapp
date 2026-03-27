<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationsCategory extends Model
{

    use HasFactory;
    protected $table = 'notifications_category';
    public $timestamps = true;
   // protected $fillable = ['prop_id', 'user_id', 'prop_name', 'prop_description', 'prop_tags', 'prop_type', 'prop_notes', 'imageVideo', 'prop_purchasePrice', 'prop_paidAmount', 'prop_salePrice', 'prop_costPercent', 'prop_extraChargePercent', 'prop_sellingCostPercent', 'prop_appreciationPercent', 'prop_incomeIncreasePercent', 'prop_expenseIncreasePercent', 'prop_depreciationPeriod', 'prop_landValue', 'prop_dateOfSale', 'prop_dateOfPossession', 'prop_dateOfBooking', 'prop_improvementCostPercent', 'prop_ConvDeedPercent', 'prop_HoldingCostPercent', 'status', 'created_at', 'updated_at'];
}