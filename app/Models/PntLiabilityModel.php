<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PntLiabilityModel extends Model
{
    protected $table = 'tbl_pnt_liabilities';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'agent_id',
        'user_id',
        'liability_name',
        'last_year_amount',
        'this_year_amount',
        'current_amount',
        'status',
    ];
}
