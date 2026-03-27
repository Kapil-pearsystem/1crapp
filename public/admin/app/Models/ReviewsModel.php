<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewsModel extends Model
{
    protected $table = "tbl_reviews";

    protected $fillable = [
        'name',
        'image',
        'rating',
        'review_text',
        'status',
        'created_by'
    ];

    // OPTIONAL: If you want to get user info who created the review
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
