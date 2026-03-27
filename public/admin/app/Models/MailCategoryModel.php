<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_mailcategory';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'status',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
