<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    use HasFactory;

    protected $table = 'tbl_product_enquiry'; // Table name

    protected $fillable = [
        'product_id',
        'product_inspection_id',
        'first_name',
        'last_name',
        'email',
        'cod_id',
        'phone',
        'brief_requirement',
        'message'
    ];
}
