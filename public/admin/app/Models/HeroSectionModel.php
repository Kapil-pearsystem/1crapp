<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSectionModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_herosection';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'status',
    ];

    public $timestamps = true;
}