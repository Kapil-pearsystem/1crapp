<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyLoan extends Model
{
    use HasFactory;
    protected $table = 'property_loans';
    public $timestamps = true;
    protected $fillable = ['id', 'property_id', 'loan_label', 'financingof', 'price_financing', 'loan_type', 'interest_rate', 'loan_term', 'mortgage_insurance', 'recurring' , 'created_at', 'updated_at', 'upfront'];

}