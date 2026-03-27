<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCollectionModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_giftcollection';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'slug',
        'mail_ids',
        'gift_ids',
        'tyc_id',
        'priority',
        'tyc_design_ids',
        'intervals',
        'sub_total',
        'discount',
        'gst_taxes',
        'courier_charges',
        'handing_charges',
        'no_of_customers',
        'payble_amount',
        'status',
        'remarks',
        'created_by',
        'created_at',
        'updated_at'
    ];
}
?>