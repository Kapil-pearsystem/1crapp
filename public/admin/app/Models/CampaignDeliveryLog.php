<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CampaignDeliveryLog extends Model
{
    protected $table = 'campaign_delivery_logs';
    protected $fillable = [
        'campaign_id',
        'user_id',
        'collection_item_id',
        'type',
        'sent_at',
    ];
}