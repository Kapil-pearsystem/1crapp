<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    use HasFactory;
    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = ['id', 'title', 'description', 'isread','userid','status', 'created_at', 'updated_at', 'created_by','type'];
}