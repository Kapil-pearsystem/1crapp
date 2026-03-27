<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_tags';
    public $timestamps = true;
    protected $fillable = ['id', 'name', 'status', 'created_at', 'created_by', 'updated_by', 'updated_at'];
}