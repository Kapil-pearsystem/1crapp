<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategoryModel extends Model
{
    use HasFactory;


    protected $table = 'tbl_faqcategory';


    protected $fillable = [
        'title',
        'status',
        'priority',
        'created_by',
    ];


    protected $hidden = [];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Define a relationship to the `FaqModel` (assuming this model exists)
    public function faq()
    {
        return $this->hasMany(FaqModel::class, 'category');
    }
}
