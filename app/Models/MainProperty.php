<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyAddress;

class MainProperty extends Model
{

    protected $primaryKey = 'prop_id';
    public $incrementing = true;
    protected $keyType = 'int';

    use HasFactory;
    protected $table = 'main_properties';
    public $timestamps = true;

    protected $fillable = [
        'prop_id',
        'user_id',
        'prop_name',
        'prop_description',
        'prop_tags',
        'prop_type',
        'prop_notes',
        'imageVideo',
        'videos',
        'other_resources',
        'prop_emi_cost_rate',
        'prop_purchasePrice',
        'prop_paidAmount',
        'prop_salePrice',
        'prop_costPercent',
        'prop_extraChargePercent',
        'prop_sellingCostPercent',
        'prop_miscellaneousChargesPercent',
        'prop_appreciationPercent',
        'prop_incomeIncreasePercent',
        'prop_expenseIncreasePercent',
        'prop_depreciationPeriod',
        'prop_landValue',
        'prop_dateOfSale',
        'prop_dateOfPossession',
        'prop_dateOfBooking',
        'prop_improvementCostPercent',
        'prop_ConvDeedPercent',
        'prop_HoldingCostPercent',
        'prop_finance_cost',
        'status',
        'purchaseCostPercent'
    ];
}