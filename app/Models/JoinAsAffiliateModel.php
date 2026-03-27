<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinAsAffiliateModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_join_as_affiliate';

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image_title',
        'image',
        
        'image_title1',
        'image1',

        'image_title2',
        'image2',     // <-- updated here
        'status',
        'created_by'
    ];
}
