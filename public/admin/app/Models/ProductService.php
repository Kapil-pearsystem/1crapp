<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{

    use HasFactory;
    protected $table = 'product_services';
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo(ProductServiceCategory::class, 'prod_category', 'id');
    }
}