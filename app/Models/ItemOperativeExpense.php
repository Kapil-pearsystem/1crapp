<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOperativeExpense extends Model
{

    use HasFactory;
    protected $table = 'item_operative_expense';
    public $timestamps = true;
   // protected $fillable = ['id', 'prop_id', 'paid_name', 'paid_type', 'paid_amount', 'paid_percentOf', 'paid_date', 'paid_remarks', 'paid_inLoan', 'created_at', 'updated_at'];
}