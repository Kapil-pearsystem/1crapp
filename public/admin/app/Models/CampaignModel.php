<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignModel extends Model
{
    protected $table = 'tbl_campaign';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'campaign_id',
        'coll_id',
        'title',
        'list_id',
        'total_contacts',
        'cost_per_contact',
        'total_cost',
        'start_date',
        'time_of_day',
        'status',
        'created_by',
    ];

    protected $casts = [
        'start_date'       => 'date',
        'total_contacts'   => 'integer',
        'cost_per_contact' => 'decimal:2',
        'total_cost'       => 'decimal:2',
        'status'           => 'integer',
        'created_by'       => 'integer',
    ];
    public function collection()
    {
        return $this->belongsTo(CollectionModel::class, 'coll_id');
    }
    public function list()
    {
        return $this->belongsTo(ContactModel::class, 'list_id');
    }
}