<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialsModel extends Model
{
    use HasFactory;

    protected $table = 'ws_testimonials';
    protected $fillable = [
        'name',
        'designation',
        'company',
        'location',
        'about',
        'rating',
        'contact',
        'image',
        'video',
        'status',
        'created_by',
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
