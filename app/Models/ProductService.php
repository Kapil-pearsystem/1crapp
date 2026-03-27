<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{

    use HasFactory;
    protected $table = 'product_services';
    public $timestamps = true;
    //protected $fillable = ['id', 'name', 'price_cat_id', 'status', 'created_at', 'updated_at'];
    public function category()
    {
        return $this->belongsTo(ProductServiceCategory::class, 'prod_category', 'id');
    }
}