<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSettingModel extends Model
{
    protected $table = 'tbl_web_setting';

    protected $fillable = [
        'address',
        'phone',
        'email',
        'google_map',
        'status',
        'created_by',
    ];
}
