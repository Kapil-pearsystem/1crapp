<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqModel extends Model
{
    use HasFactory;


    protected $table = 'tbl_faq';


    protected $fillable = [
        'id',
        'category',
        'title',
        'description',
        'status',
        'created_by',

    ];


    protected $hidden = [];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(FaqCategoryModel::class, 'category_id');
    }

    // Relationship to the User model (assuming the column 'created_by' exists and refers to a User)
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
