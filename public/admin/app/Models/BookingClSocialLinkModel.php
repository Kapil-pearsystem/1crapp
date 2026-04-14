<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingClSocialLinkModel extends Model
{
    protected $table = 'tbl_booking_cl_social_link';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'calender_id',
        'title',
        'url',
        'status',
        'created_by'
    ];

    // 🔗 Relation
    public function calender()
    {
        return $this->belongsTo(BookingCalenderModel::class, 'calender_id', 'id');
    }
}