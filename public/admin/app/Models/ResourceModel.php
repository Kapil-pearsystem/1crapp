<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_resources';
    public $timestamps = true;
    protected $fillable = ['id', 'category', 'title','description', 'authorization', 'ribbon','link','status', 'created_by', 'created_at', 'updated_at'];
}