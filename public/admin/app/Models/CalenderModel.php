<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CalenderModel extends Model
{
    protected $table = 'tbl_calender';

    protected $fillable = [
        'title',
        'select_lp_id',
        'aa_page_id',
        'select_booking_page_id',
        'homework_page_id',
        'thank_you_id',
        'status',
        'created_by'
    ];

    /**
     * Auto handle timestamps
     */
    public $timestamps = true;
}