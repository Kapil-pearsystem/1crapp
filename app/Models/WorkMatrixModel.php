<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkMatrixModel extends Model
{
    // Set custom table name
    protected $table = 'tbl_work_matrix';

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'created_by',
    ];
}
