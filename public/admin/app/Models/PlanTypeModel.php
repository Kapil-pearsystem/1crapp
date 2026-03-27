<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanTypeModel extends Model
{
    use SoftDeletes;

    protected $table = 'plan_type';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'total_months',
        'total_days',
        'discount',
        'status'
    ];

    protected $dates = [
        'deleted_at'
    ];
}