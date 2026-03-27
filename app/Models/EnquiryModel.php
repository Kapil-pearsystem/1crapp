<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EnquiryModel extends Model
{
    protected $table = 'tbl_enquiry';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
}
