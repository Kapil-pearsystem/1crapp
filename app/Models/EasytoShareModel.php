<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EasytoShareModel extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_easytoshare';

    
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'created_at',
        'updated_at',
    ];
}
