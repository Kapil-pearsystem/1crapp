<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImageModel extends Model
{
    protected $table = 'tbl_project_images';

    protected $fillable = [
        'project_id',
        'category_id',
        'media_type',
        'file_path',
        'link',
        'status',
        'created_by',
    ];

    public function project()
    {
        return $this->belongsTo(ProjectModel::class, 'project_id');
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategoryModel::class, 'category_id');
    }
}
