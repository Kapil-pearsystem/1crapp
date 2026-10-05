<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    use HasFactory;

    protected $table = 'rms_shops';

    protected $fillable = [
        'project_id',
        'account_id',
        'shop_name',
        'type',
        'monthly_rent',
        'cleaning_cost',
        'electricity_applicable',
        'issue_day',
        'due_day',
        'agent_id',
        'created_by',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(RmsProjectModel::class, 'project_id');
    }
    public function account()
    {
        return $this->belongsTo(AccountModel::class, 'account_id');
    }
}