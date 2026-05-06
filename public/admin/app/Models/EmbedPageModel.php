<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmbedPageModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_embedded_pages';

    protected $fillable = [
        'title',
        'page_url',
        'embed_link',
        'embed_code',
        'custom_header_visible',
        'custom_footer_visible',
        'status',
        'created_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
