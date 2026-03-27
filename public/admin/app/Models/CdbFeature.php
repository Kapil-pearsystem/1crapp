<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CdbFeature extends Model
{
    use HasFactory;
    protected $table = 'cdb_features';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'path',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
