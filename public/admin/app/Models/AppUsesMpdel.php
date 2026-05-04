<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUsesMpdel extends Model
{
    use HasFactory;

    protected $table = 'tbl_1crappuses';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'realtor_title',
        'realtor_image',
        'realtor_subtitle',
        'realtor_shortdesc',
        'realtor_description',
        'realtor_btntext',
        'realtor_btnlink',
        'realtor_btnlink_new_tab',
        'investor_title',
        'investor_image',
        'investor_subtitle',
        'investor_shortdesc',
        'investor_description',
        'investor_btntext',
        'investor_btnlink',
        'investor_btnlink_new_tab',
        'status',
        'created_by'
    ];
}