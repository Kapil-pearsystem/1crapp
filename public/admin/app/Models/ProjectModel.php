<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $table = 'tbl_project';

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'status',
        'created_by',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategoryModel::class, 'category_id');
    }

    public function media()
    {
        return $this->hasMany(ProjectImageModel::class, 'project_id');
    }
}
