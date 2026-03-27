<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyCategoryTypeModel extends Model

{

    use HasFactory, SoftDeletes;

    

    protected $table = 'tbl_property_type';



    protected $primaryKey = 'id';



    public $timestamps = true;



    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';



    protected $fillable = [

        'category_id',

        'title',

        'status',

        'created_by',

        'created_at',

        'updated_at'

    ];

}

