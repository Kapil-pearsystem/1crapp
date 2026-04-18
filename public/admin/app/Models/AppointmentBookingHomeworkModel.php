<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AppointmentBookingHomeworkModel extends Model
{
    protected $table = 'tbl_appointment_booking_homework';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'page_name',
        'slug',
        'sub_title',
        'media_type',
        'media_path',
        'media_visible',
        'sort_description',
        'embed_code',
        'ec_visible',
        'file_drive_id',
        'fd_visible',
        'form_id',
        'form_visible',
        'typ_cta_text',
        'typ_visible',
        'status',
        'created_by'
    ];

    /**
     * 🔥 Boot method for auto slug
     */
    protected static function boot()
    {
        parent::boot();

        // 👉 CREATE case
        static::creating(function ($model) {
            $model->generateSlug();
        });

        // 👉 UPDATE case (optional)
        static::updating(function ($model) {
            // agar page_name change ho to slug update karo
            if ($model->isDirty('page_name')) {
                $model->generateSlug();
            }
        });
    }

    /**
     * 🔥 Slug generator (unique)
     */
    public function generateSlug()
    {
        $baseSlug = Str::slug($this->page_name ?? $this->title);

        $slug = $baseSlug;
        $count = 1;

        while (
            self::where('slug', $slug)
                ->when($this->id, function ($q) {
                    return $q->where('id', '!=', $this->id);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $count++;
        }

        $this->slug = $slug;
    }
}