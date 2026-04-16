<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CalenderModel extends Model
{
    protected $table = 'tbl_calender';

    protected $fillable = [
        'page_name',
        'slug',
        'titl',
        'select_lp_id',
        'aa_page_id',
        'select_booking_page_id',
        'homework_page_id',
        'thank_you_id',
        'status',
        'created_by'
    ];

    /**
     * Auto handle timestamps
     */
    public $timestamps = true;

    /**
     * Boot function for slug
     */
    protected static function boot()
    {
        parent::boot();

        // Create time slug generate
        static::creating(function ($model) {
            $model->slug = self::generateUniqueSlug($model->page_name);
        });

        // Update time slug regenerate if page_name changed
        static::updating(function ($model) {
            if ($model->isDirty('page_name')) {
                $model->slug = self::generateUniqueSlug($model->page_name, $model->id);
            }
        });
    }

    /**
     * Generate unique slug
     */
    public static function generateUniqueSlug($name, $id = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (self::where('slug', $slug)
            ->when($id, function ($query) use ($id) {
                return $query->where('id', '!=', $id);
            })
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}