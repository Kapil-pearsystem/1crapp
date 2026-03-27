<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class AssetsModel extends Model

{

    use HasFactory;

    protected $table = 'tbl_assets';
    protected $fillable = [
        'id',
        'title',
        'new_tab',
        'url',
        'page_type',
        'open_in_new_tab',
        'non_deletable',
        'status',
        'created_by',
        'created_at',
        'updated_at',
    ];

}

