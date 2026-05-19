<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottomFooterModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_btmfooter';

    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'image_visible',
        'btn_text',
        'btn_link',
        'left_enable',
        'title',
        'description',
        'google_review_image',
        'trust_pilot_image',
        'google_review_enable',
        'trust_pilot_enable',
        'google_review_url',
        'trust_pilot_url',
        'subscribe_title',
        'subscribe_content',
        'subscribe_embededcode',
        'subscribe_enable',
        'status',
        'created_by',
    ];
    public $timestamps = true;
}