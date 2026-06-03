<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignSchedule extends Model
{
    use HasFactory;

    protected $table = 'campaign_schedules';

    protected $fillable = [
        'campaign_id',
        'type',
        'item_id',
        'start_date',
        'end_date',
        'schedule_time',
        'status',
        'sent_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'sent_at' => 'datetime',
    ];

    /**
     * Related Collection Item
     */
    public function item()
    {
        return $this->belongsTo(CollectionItemModel::class, 'item_id');
    }
}