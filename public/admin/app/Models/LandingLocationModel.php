<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingLocationModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_landing_location';

    protected $fillable = [
        'title',
        'image',
        'description',
        'status',
        'created_by',
    ];
}
