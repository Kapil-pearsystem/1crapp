<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSourceModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_formsource';
    protected $fillable = [
        'title',
        'slug',
        'status',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
