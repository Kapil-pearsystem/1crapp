<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingBannerModel extends Model
{
    protected $table = 'tbl_landing_banner';

    protected $fillable = [
        'title',
        'subtitle',
        'main_image',
        'launch_date',
        'expiry_date',
        'repa_number',
        'promo_video_url',
        'cta_button_text',
        'status',
        'created_by'
    ];

    /**
     * Banner has many images
     */
    public function images()
    {
        return $this->hasMany(LandingBannerImageModel::class, 'banner_id');
    }

    /**
     * Optional: Created by user
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
