<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class GiftMailModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_giftmail';

    protected $fillable = [
        'id',
        'category',
        'title',
        'celebration_title',
        'user_id',
        'slug',
        'subject',
        'agent_subject',
        'content',
        'cta_link',
        'temp_name',
        'cta_visible',
        'cta_type',
        'cta_title',
        'cta_text',
        'signature_visible',
        'sign_name',
        'sign_web',
        'sign_email',
        'sign_phone',
        'ps_visible',
        'ps_title',
        'ps_link',
        'logo',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function createSlug($title)
    {
        return Str::slug($title);
    }

    /**
     * Boot method to generate slug before saving.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = self::createSlug($model->title);
        });

        static::updating(function ($model) {
            $model->slug = self::createSlug($model->title);
        });
    }
}