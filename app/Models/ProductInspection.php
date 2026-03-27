<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInspection extends Model
{
    use HasFactory;

    protected $table = 'tbl_product_inspection';

    protected $fillable = [
        'product_id',
        'bullet1',
        'bullet2',
        'bullet3',
        'bullet4',
        'bullet5',
        'bullet6',
        'youtube_embed_link',
        'title',
        'title_link',
        'status',
        'created_by',
    ];
}
