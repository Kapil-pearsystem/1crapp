<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $table = 'user_details';
    protected $fillable = [ 
        'id', 'user_id', 'official_email', 'personal_website', 'country', 'state', 'city', 'address', 'zip', 'phone', 'dob', 'spouse_dob', 'anniversary', 'no_of_childrens', 'worked_in', 'status', 'created_at', 'updated_at' 
    ];
}

