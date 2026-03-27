<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;

    protected $table = 'ws_services';

    protected $fillable = [
        'category_id',
        'slug',
        'title',
        'link',
        'video_link',
        'description',
        'image',
        'status',
        'created_by',
    ];
}
