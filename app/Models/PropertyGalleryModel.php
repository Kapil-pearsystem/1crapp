<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyGalleryModel extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'property_gallery';

    // Primary key
    protected $primaryKey = 'id';

    // Timestamps (Laravel will look for created_at and updated_at columns automatically)
    public $timestamps = true;

    // The attributes that are mass assignable
    protected $fillable = [
        'prop_id',
        'category',
        'title',
        'type',
        'file_type',
        'link',
        'image',
        'status',
        'created_by',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
