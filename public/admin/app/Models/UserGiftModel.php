<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGiftModel extends Model
{
    protected $table = 'tbl_user_gifts';

    protected $fillable = [
        'collection_id',
        'item_id',
        'user_id',
        'gift_id',
        'agent_id',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    public function gift()
    {
        return $this->belongsTo(GiftModel::class, 'gift_id');
    }
}