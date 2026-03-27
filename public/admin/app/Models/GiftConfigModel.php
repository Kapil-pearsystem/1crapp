<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GiftConfigModel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_giftconfig';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'key',
        'title',
        'price',
        'status',
        'deleted_at',
        'created_by',
        'created_at',
        'updated_at'
    ];
    protected $dates = ['deleted_at'];

}