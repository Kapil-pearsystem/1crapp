<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPermissionModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_plan_permission';
    public $timestamps = true;
    protected $fillable = ['id', 'agent_id', 'plan_id', 'permission', 'created_at', 'updated_at'];
}