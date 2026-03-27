<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;
    protected $table = 'cms';
    public $timestamps = true;
    protected $fillable = ['id', 'name', 'description', 'status', 'created_at', 'created_by', 'updated_by', 'updated_at','slug','image'];
}