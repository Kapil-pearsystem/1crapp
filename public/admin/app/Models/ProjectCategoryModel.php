<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategoryModel extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'tbl_project_categories';

    // Fillable columns
    protected $fillable = [
        'title',
        'description',
        'status',
        'created_by'
    ];
}
