<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class AssetModel extends Model

{

    use HasFactory;

    protected $table = 'tbl_assets';

    protected $fillable = ['id','title', 'new_tab', 'url','status','created_at','crated_by','updated_at'];

}