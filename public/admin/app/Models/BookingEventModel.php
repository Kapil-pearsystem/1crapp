<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingEventModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_booking_event';

    protected $fillable = [
        'step',
        'title',
        'description',
        'image',
        'video_link',
        'status',
        'created_by'
    ];
}
