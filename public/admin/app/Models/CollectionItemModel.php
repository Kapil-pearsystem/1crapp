<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionItemModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_collection_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'collection_id',
        'postal_type',
        'category',
        'availability',
        'discount',
        'item_id',
        'thankYouStatus',
        'tyc_id',
        'schedule_day',
        'schedule_time',
        'created_by',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Collection Relation
    public function collection()
    {
        return $this->belongsTo(CollectionModel::class, 'collection_id');
    }
}