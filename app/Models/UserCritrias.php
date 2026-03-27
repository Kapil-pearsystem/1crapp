<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCritrias extends Model
{
    use HasFactory;
    protected $table = 'users_critrias';
    protected $fillable = [
        'master_critrias_id',
        'user_id',
        'criteria_value',
    ];
}
