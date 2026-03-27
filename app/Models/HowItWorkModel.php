<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowItWorkModel extends Model
{
    protected $table = 'tbl_how_it_works';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category',
        'section_side',
        'step',
        'title',
        'description',
        'priority',
        'status',
        'images',
        'created_by',
    ];

    public $timestamps = true;

    
}
