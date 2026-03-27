<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'ws_servicecategory';

    protected $fillable = [
        'title',
        'slug',
        'status',
        'created_by',
    ];

}
