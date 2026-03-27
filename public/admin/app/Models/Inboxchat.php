<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboxChat extends Model
{

    use HasFactory;
    protected $table = 'inbox_chat';
    public $timestamps = true;
   // protected $fillable = ['id', 'name', 'content', 'isread','userid','status', 'created_at', 'updated_at'];
}