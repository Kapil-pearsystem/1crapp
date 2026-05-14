<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorePageModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_core_pages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'page_name',
        'slug',
        'layout',
        'status',
        'created_by',
    ];

    public $timestamps = true;
    
    public function sections()
    {
        return $this->hasMany(CorePageSecModel::class, 'cp_id', 'id');
    }
}