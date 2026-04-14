<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingCalenderModel extends Model
{
    protected $table = 'tbl_booking_calender';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'page_name',
        'slug',
        'logo',
        'logo_visible',
        'calender_code',
        'sub_title',
        'sub_title_color',
        'sortdescription',
        'description1',
        'des_is_visible1',
        'description2',
        'des_is_visible2',
        'description3',
        'des_is_visible3',
        'join_title',
        'join_subtitle',
        'cta_text',
        'cta_page_id',
        'header_footer_cta_bg_color',
        'header_footer_cta_text_color',
        'status',
        'created_by'
    ];

    // 🔗 Relation
    public function socialLinks()
    {
        return $this->hasMany(BookingClSocialLinkModel::class, 'calender_id', 'id');
    }
}