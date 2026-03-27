<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CdbPlanModel extends Model
{
    use HasFactory;

    // Table name (since it does not follow Laravel naming convention)
    protected $table = 'cdb_plans';

    // Primary key (optional since default is id)
    protected $primaryKey = 'id';

    // Mass assignable fields
    protected $fillable = [
        'agent_id',
        'title',
        'status',
    ];
    public $timestump = true;

}
