<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamDetailModel extends Model
{
    use HasFactory;

    protected $table = "tbl_team_detail";

    protected $fillable = [
        'category_id',
        'name',
        'designation',
        'description',
        'button_title',
        'button_link',
        'image',
        'facebook',
        'instagram',
        'youtube',
        'linkedin',
        'twitter',
        'whatsapp',
        'google',
        'status',
        'created_by',
    ];

    // ⭐ RELATION (Team belongs to Category)
    public function category()
    {
        return $this->belongsTo(\App\Models\MeetCategoryModel::class, 'category_id', 'id');
    }
}
