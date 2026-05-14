<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomMenuModel extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'tbl_custommenu';

    // Primary Key
    protected $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // Fillable Fields
    protected $fillable = [
        'icon',
        'title',
        'page_url',
        'parent_id',
        'type',
        'open_new_tab',
        'status',
        'created_by'
    ];
}