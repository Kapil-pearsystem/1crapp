<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignupCmsModel extends Model
{
    protected $table = 'tbl_signupcms';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'logo_visible',
        'tagline_text',
        'tagline_visible',
        'file_type',
        'file_path',
        'file_visible',
        'b1_icon',
        'b1_text',
        'b2_icon',
        'b2_text',
        'b3_icon',
        'b3_text',
        'b4_icon',
        'b4_text',
        'bullet_visible',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];
}