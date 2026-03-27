<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EnquiryModel extends Model
{
    protected $table = 'tbl_enquiry';
    protected $fillable = [
        'name',
        'email',
        'customer_id',
        'cdo_id',
        'form_id',
        'ps_id',
        'phone',
        'message',
        'status',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
