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
        'after_days',
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
    public function gift()
    {
        return $this->belongsTo(
            GiftModel::class,
            'item_id',
            'id'
        );
    }
    
    public function mail()
    {
        return $this->belongsTo(
            GiftMailModel::class,
            'item_id',
            'id'
        );
    }
    public function log()
    {
        return $this->hasOne(
            CampaignDeliveryLog::class,
            'collection_item_id',
            'item_id'
        );
    }
    
}