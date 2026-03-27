<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseCriteriaContent extends Model
{

    use HasFactory;
    protected $table = 'purchase_criteria_content';
    public $timestamps = true;
   // protected $fillable = ['id', 'name', 'content', 'isread','userid','status', 'created_at', 'updated_at'];
}