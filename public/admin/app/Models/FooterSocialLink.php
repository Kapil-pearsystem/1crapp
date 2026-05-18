<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSocialLink extends Model
{
    use HasFactory;

    protected $table = 'tbl_footer_sociallinks';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'icon',
        'link',
        'new_tab',
        'created_by'
    ];

    protected $casts = [
        'new_tab' => 'boolean'
    ];
}