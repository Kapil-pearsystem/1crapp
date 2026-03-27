<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EasytoUseModel extends Model
{
    use HasFactory;

     protected $table = 'tbl_easytouse';


     protected $fillable = [
         'title',
         'description',
         'status',
         'image',
         'created_by'
     ];


     protected $dateFormat = 'Y-m-d H:i:s';


     public $timestamps = true;
}
