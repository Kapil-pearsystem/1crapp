<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PNTModel extends Model
{
    protected $table = 'tbl_pnt';        // Table name

    protected $primaryKey = 'id';        // Primary key

    // If your table does NOT have created_at / updated_at fields
    public $timestamps = true;

    // Fillable columns
    protected $fillable = [
        'agent_id',
        'user_id',
        'asset_name',
        'last_year_amount',
        'this_year_amount',
        'current_amount',
        'status',
        'created_at',
        'updated_at'
    ];
}
