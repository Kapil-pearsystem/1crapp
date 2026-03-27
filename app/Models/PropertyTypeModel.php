<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyTypeModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_propertytype';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'key',
        's_code',
        'status',
        'priority',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
