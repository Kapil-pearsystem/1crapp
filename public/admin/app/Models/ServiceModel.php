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
        'get_started_link',
        'start_link_new_tab',
        'explore_more_link',
        'explore_more_link_new_tab',
        'description',
        'image',
        'status',
        'created_by',
    ];
}
