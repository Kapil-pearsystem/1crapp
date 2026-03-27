<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDOModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_cdo';
    public $timestamps = true;
    protected $fillable = ['id', 'category', 'name', 'slug', 'status', 'created_at', 'created_by', 'updated_at'];
}