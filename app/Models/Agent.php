<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agents';

    // No fillable or guarded since it's used for frontend read-only
    public $timestamps = true;

    protected $guarded = [];
}
