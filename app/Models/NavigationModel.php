<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NavigationModel extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'tbl_header_navigation';

    // Mass assignable attributes
    protected $fillable = ['id', 'title', 'parent_page_id', 'page_id', 'is_authorized', 'status', 'priority', 'created_by', 'created_at', 'updated_at'];
    public $timestamps = true;
    public function parentAsset()
    {
        return $this->belongsTo(AssetModel::class, 'parent_page_id');
    }
    
    public function asset()
    {
        return $this->belongsTo(AssetModel::class, 'page_id');
    }
}