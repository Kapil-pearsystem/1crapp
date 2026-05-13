<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomLayoutModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_customlayout';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'logo',
        'btn_text',
        'btn_bg_color',
        'btn_text_color',
        'btn_link',
        'open_new_tab',
        'copyright_text',
        'status',
        'created_by'
    ];
}