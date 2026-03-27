<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_banners';

    protected $fillable = [
        'title',
        'link',
        'description',
        'left_image',
        'right_image',
        'created_by',
        'status'
    ];

    public $timestamps = true;
}
