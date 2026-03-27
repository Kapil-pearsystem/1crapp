<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDriveModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_filedrive';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'path',
        'status',
        'created_by',
    ];
}
