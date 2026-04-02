<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadMagnetModel extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'tbl_lead_magnet';

    // Primary key
    protected $primaryKey = 'id';

    // Auto increment
    public $incrementing = true;

    // Timestamps enable
    public $timestamps = true;

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'agent_id',
        'page_url',
        'pre_headline',
        'pre_headline_visible',
        'headline',
        'headline_visible',
        'post_headline',
        'post_headline_visible',
        'bullet1',
        'bullet2',
        'bullet3',
        'bullet4',
        'bullet5',
        'bullet6',
        'bullet_status',
        'media_type',
        'media_path',
        'media_visible',
        'countdown_datetime',
        'countdown_visible',

        'pre_cta',
        'pre_cta_visible',

        'ps_text',
        'ps_text_visible',

        'popup_enable',
        'page_new_tab',
        'page_cta_url',
        'popup_type',
        'custom_form_id',
        'form_embed_code',

        'price_select_form',
        'enable_form_custom',

        'cta_title',
        'cta_sub_title',

        'is_public',
        'public_type'
    ];

    // Optional: cast toggle fields as boolean
    protected $casts = [
        'pre_headline_visible' => 'boolean',
        'headline_visible' => 'boolean',
        'post_headline_visible' => 'boolean',
        'bullet_status' => 'boolean',
        'media_visible' => 'boolean',
        'countdown_visible' => 'boolean',
        'pre_cta_visible' => 'boolean',
        'ps_text_visible' => 'boolean',
        'popup_enable' => 'boolean',
    ];
}
