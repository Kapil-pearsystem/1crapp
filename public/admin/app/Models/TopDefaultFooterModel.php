<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopDefaultFooterModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_topfooter';
    protected $primaryKey = 'id';
    protected $fillable = [
        'logo',
        'logo_link',
        'logo_enable',

        'playstore_logo',
        'playstore_link',
        'playstore_enable',

        'promo_title',
        'promo_subtitle',
        'promo_content',
        'promo_icon',
        'promo_btn_text',
        'promo_btn_link',
        'promo_enable',

        'status',
        'created_by',
    ];
    public $timestamps = true;
}