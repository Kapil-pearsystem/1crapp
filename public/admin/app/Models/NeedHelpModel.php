<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedHelpmodel extends Model
{
    protected $table = 'tbl_need_help';

    protected $fillable = [
        'title',
        'url',
        'url_new_tab',
        'image',
        'status',
        'created_by',
    ];
}
