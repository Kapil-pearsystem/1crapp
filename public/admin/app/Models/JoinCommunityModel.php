<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinCommunityModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_joincommunity';

    protected $primaryKey = 'id';

    protected $fillable = [
        'icon',
        'title',
        'content',
        'btn_text',
        'btn_link',
        'priority',
        'status',
        'created_by'
    ];
}