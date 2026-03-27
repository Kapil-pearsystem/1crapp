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
        'start_free_trial_link',
        'start_link_new_tab',
        'talk_to_expert_link',
        'talk_to_expert_link_new_tab',
        'description',
        'left_image',
        'right_image',
        'created_by',
        'status'
    ];

    public $timestamps = true;
}
