<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialNetworks extends Model
{
    use HasFactory;
    protected $table = 'user_social_networks';
    protected $fillable = [ 
        'id', 'user_id', 'facebook', 'youtube', 'linkedin', 'twitter', 'telegram', 'skype', 'instagram', 'other', 'status', 'created_at', 'updated_at'
    ];
}

