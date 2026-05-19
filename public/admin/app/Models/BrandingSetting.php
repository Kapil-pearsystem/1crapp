<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandingSetting extends Model
{
    use HasFactory;
    protected $table = 'branding_setting';
    public $timestamps = true;
    protected $fillable = ['id', 'user_id', 'role_id', 'title', 'prepared_by', 'email', 'phone', 'logo', 'favicon', 'theme_color','message','copyright_year', 'btn_title', 'btn_link', 'btn_text_color', 'btn_bg_color', 'btn_new_tab', 'btn_enable', 'created_at', 'updated_at'];
}