<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppFeedbackModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_app_feedback';

    protected $fillable = [
        'overall_experience',
        'recommend_rating',
        'easy_to_manage',
        'suggestion',
        'created_by',
    ];
}
