<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RmsProjectModel extends Model
{
    protected $table = 'rms_projects';

    protected $fillable = [
        'agent_id',
        'name',
        'code',
        'city',
        'address',
        'status',
        'created_by',
    ];

    protected $casts = [
        'status' => 'integer',
    ];
}