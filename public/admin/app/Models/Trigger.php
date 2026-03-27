<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trigger extends Model
{

    use HasFactory;
    protected $table = 'triggers';
    public $timestamps = true;
    protected $fillable = ['id', 'type', 'name', 'content', 'status', 'isread', 'userid', 'trigger_if', 'trigger_roe', 'trigger_is', 'trigger_greater_than', 'target', 'link', 'description', 'created_at', 'updated_at'];
}