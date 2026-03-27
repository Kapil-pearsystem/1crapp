<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_about_us';

    protected $fillable = [
        'title',
        'description',
        'leadership',
        'leadership_image',
        'name',
        'designation',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'footer_content',
        'status',
        'created_by'
    ];
}
