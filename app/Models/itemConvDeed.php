<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemConvDeed extends Model
{

    use HasFactory;
    protected $table = 'item_conv_deed';
    public $timestamps = true;
    protected $fillable = ['id', 'prop_id', 'paid_name', 'paid_type', 'paid_amount', 'paid_percentOf', 'paid_date', 'paid_inLoan', 'created_at', 'updated_at'];
}