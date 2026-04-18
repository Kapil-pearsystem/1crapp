<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleAppointmentModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_schedule_appointment';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'schedule_date',
        'schedule_hour',
        'schedule_minute',
        'schedule_am_pm',
        'duration',

        'title',
        'calendar_product_id',

        'contact_list_id',
        'location_url',
        'meeting_source',

        'tags',
        'excluded_tags',

        'remarks',

        'remind_me',
        'remind_me_via',
        'remind_me_at',
        'remind_me_message',

        'remind_customer',
        'remind_customer_via',
        'remind_customer_at',
        'remind_customer_message',

        'status',
        'created_by'
    ];

    // ✅ Optional: Casts (best practice)
    protected $casts = [
        'schedule_date' => 'date',
        'remind_me' => 'boolean',
        'remind_customer' => 'boolean',
        'status' => 'boolean'
    ];
}