<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaModel extends Model
{
    protected $table = 'tbl_media';

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'date',
        'status',
        'created_by'
    ];
}
