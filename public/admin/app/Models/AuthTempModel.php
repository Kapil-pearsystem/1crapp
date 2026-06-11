<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthTempModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_authtemp';
    protected $primaryKey = 'id';
    protected $fillable = [
        'agent_id',
        'category',
        'logo',
        'title',
        'subject',
        'top_content',
        'bottom_content',
        'copyright_text',
        'created_by',
    ];

    public $timestamps = true;
}