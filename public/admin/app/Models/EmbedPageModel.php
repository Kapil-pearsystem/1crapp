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
        'status',
        'created_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
