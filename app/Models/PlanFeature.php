<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{

    use HasFactory;
    protected $table = 'plan_features';
    // public $timestamps = true;
    protected $fillable = [ 'id', 'title', 'f_key', 'created_at', 'status'];
}