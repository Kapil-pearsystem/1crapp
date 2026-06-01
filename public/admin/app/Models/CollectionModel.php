<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionModel extends Model
{
    protected $table = 'tbl_collection';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'total',
        'discount',
        'final_total',
        'courier',
        'handling',
        'gst',
        'gross_amount',
        'status',
        'created_by',
    ];

    // If you're using Laravel timestamps
    public $timestamps = true;

    // Optional: custom timestamp columns
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}