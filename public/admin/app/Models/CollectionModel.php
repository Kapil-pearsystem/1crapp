<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionModel extends Model
{
    protected $table = 'tbl_collection';

    protected $primaryKey = 'id';

    protected $fillable = [
        'seqID',
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
    
    public function emails()
    {
        return $this->hasMany(CollectionItemModel::class, 'collection_id', 'id')->where('postal_type', 1);
    }
    public function gifts()
    {
        return $this->hasMany(CollectionItemModel::class, 'collection_id', 'id')->where('postal_type', 2);
    }
}