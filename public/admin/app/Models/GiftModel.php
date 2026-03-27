<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_gift';
    public $timestamps = true;
    protected $fillable = ['id', 'category', 'title', 'image', 'thumbnail', 'ribbon','description', 'mrp','discount', 'coupon_code','coupon_discount', 'status', 'created_by','created_at','updated_at'];
}