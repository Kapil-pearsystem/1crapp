<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOtherIncome extends Model
{

    use HasFactory;
    protected $table = 'item_other_income';
    public $timestamps = true;
    //protected $fillable = ['id', 'prop_id', 'paid_name', 'paid_type', 'paid_amount', 'paid_percentOf', 'paid_date', 'paid_remarks', 'paid_inLoan', 'created_at', 'updated_at'];
}