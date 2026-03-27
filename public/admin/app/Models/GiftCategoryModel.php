<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'gift_category';
    public $timestamps = true;
    protected $fillable = ['id', 'name','status', 'created_at', 'created_by','updated_at'];
}