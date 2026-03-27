<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemVacantRate extends Model
{

    use HasFactory;
    protected $table = 'item_vacant_rate';
    public $timestamps = true;
  //  protected $fillable = ['id', 'prop_id', 'paid_name', 'paid_type', 'paid_amount', 'paid_percentOf', 'paid_date', 'paid_remarks', 'paid_inLoan', 'created_at', 'updated_at'];
}