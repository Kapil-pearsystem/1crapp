<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetCategoryModel extends Model
{
    protected $table = 'tbl_meet_category';

    protected $fillable = [
        'category',
        'status',
        'created_by'
    ];
}
