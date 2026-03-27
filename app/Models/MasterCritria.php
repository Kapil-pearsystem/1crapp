<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCritria extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_id',
        'tital',
        'type',
        'content',
        'video_link'
    ];
}
