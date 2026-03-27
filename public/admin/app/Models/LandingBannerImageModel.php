<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingBannerImageModel extends Model
{
    protected $table = 'tbl_landing_banner_images';

    protected $fillable = [
        'banner_id',
        'image_url',
        'priority',
        'created_by'
    ];

    /**
     * Image belongs to a banner
     */
    public function banner()
    {
        return $this->belongsTo(LandingBannerModel::class, 'banner_id');
    }

    /**
     * Optional: Created by user
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
