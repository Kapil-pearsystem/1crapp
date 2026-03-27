<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CdbPlanFeature extends Model
{
    use HasFactory;

    /**
     * Table Name
     * Since it doesn't follow Laravel's plural convention
     */
    protected $table = 'cdb_plan_features';

    /**
     * Primary Key
     */
    protected $primaryKey = 'id';

    /**
     * Mass Assignable Fields
     */
    protected $fillable = [
        'agent_id',
        'plan_id',
        'permission',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'agent_id' => 'integer',
        'plan_id'  => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
