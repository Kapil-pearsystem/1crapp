<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyMarket extends Model
{

    use HasFactory;
    protected $table = 'propertymarkets';
    public $timestamps = true; 
}