<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetTeamModel extends Model
{
    protected $table = 'tbl_meet_team';

    protected $fillable = [
        'title',
        'description',
        'button_title',
        'button_link',
        'short_content',
        'content',
        'status',
        'created_by'
    ];
}
