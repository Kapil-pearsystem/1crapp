<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentSettingModel extends Model
{
    protected $table = 'tbl_agent_settings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category',
        'tutorial_link',
        'video_link',
        'status',
    ];

    public $timestamps = true;
}
