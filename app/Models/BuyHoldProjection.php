<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyHoldProjection extends Model
{
    use HasFactory;
    protected $table = 'buy_hold_projections';
    protected $fillable = [
        'property_id',
        'user_id',
        'gross_rent_yearly',
        'operating_cost',
        'net_operating_income',
        'cummulatice_cash_flow',
        'net_balance_at_the_end_month',
        'market_value_property',
        'year_accumulated_equity',
        'cash_flow',
        'principle_part_debt_paydown',
        'interest_part_debt_paydown',
        'total_annual_return',
        'total_amount_received_sale',
        'gross_investment_cash_out',
        'roi_on_sale_in_investment',
        'compound_annual_growth_rate',
    ];
}
