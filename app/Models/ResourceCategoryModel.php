<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_resource_category';
    public $timestamps = true;
    protected $fillable = ['id', 'name','status', 'created_by', 'created_at', 'updated_at'];
}