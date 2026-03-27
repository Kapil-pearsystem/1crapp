<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{

    use HasFactory;
    protected $table = 'role_has_permissions';
    public $timestamps = true;
    //protected $fillable = ['id', 'name', 'price_cat_id', 'status', 'created_at', 'updated_at'];
}