<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ThankYouCardModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_thankyoucards';

    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'status',
        'created_by',
        'created_at',
        'updated_at',
    ];

    public static function createSlug($name)
    {
        return Str::slug($name);
    }

    /**
     * Boot method to generate slug before saving.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = self::createSlug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = self::createSlug($model->name);
        });
    }
}