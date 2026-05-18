<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMenu extends Model
{
    use HasFactory;

    protected $table = 'tbl_footer_menues';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'category',
        'title',
        'link',
        'new_tab',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];
}