<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdbSettingsModel extends Model
{
    use HasFactory;
    protected $table = 'adb_dashboard';
    protected $primaryKey = 'id';
    protected $fillable = [
        'demo_link',
        'demo_link_enable',
        'chatbot_code',
        'chatbot_code_enable',
        'created_by'
    ];
}