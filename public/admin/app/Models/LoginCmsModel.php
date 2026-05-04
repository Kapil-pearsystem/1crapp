<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginCmsModel extends Model
{
    protected $table = 'tbl_logincms';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'logo_visible',
        'tagline_text',
        'tagline_visible',
        'file_type',
        'file_path',
        'file_visible',
        'content',
        'content_visible',
        'gotit_image',
        'gotit_link',
        'gotit_visible',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];
}