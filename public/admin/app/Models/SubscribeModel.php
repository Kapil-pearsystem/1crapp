<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeModel extends Model
{
    use HasFactory;

    
    protected $table = 'tbl_subscribe';

    
    protected $primaryKey = 'id';

    
    public $timestamps = true;

    
    protected $fillable = [
        'email',
       
    ];

    
}
