<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AppointmentBookingModel extends Model
{
    protected $table = 'tbl_appointment_booking';

    protected $fillable = [
        'page_name',
        'slug',
        'title',
        'subtitle',
        'sort_description',
        'step_title',
        'left_title',
        'left_description1',
        'left_title2',
        'left_description2',
        'left_title3',
        'left_description3',
        'embed_title',
        'embed_code',
        'testimonial_title',
        'test_visible',
        'test_title_visible',
        'status',
        'created_by'
    ];

    /**
     * Auto generate slug from page_name
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            if (empty($model->slug)) {

                $baseSlug = Str::slug($model->page_name);
                $slug = $baseSlug;
                $count = 1;

                // ✅ Unique slug check
                while (self::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count;
                    $count++;
                }

                $model->slug = $slug;
            }
        });

        // ✅ update case (important)
        static::updating(function ($model) {

            if ($model->isDirty('page_name')) {

                $baseSlug = Str::slug($model->page_name);
                $slug = $baseSlug;
                $count = 1;

                while (self::where('slug', $slug)
                    ->where('id', '!=', $model->id)
                    ->exists()) {

                    $slug = $baseSlug . '-' . $count;
                    $count++;
                }

                $model->slug = $slug;
            }
        });
    }
}