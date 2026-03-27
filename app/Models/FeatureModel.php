<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_features';

    
    protected $fillable = ['title', 'description', 'image', 'status'];

    
    public $timestamps = true;
}
