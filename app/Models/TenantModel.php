<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantModel extends Model
{
    use HasFactory;

    protected $table = 'rms_tenants';

    protected $fillable = [
        'project_id',
        'shop_id',
        'reminder_day',
        'name',
        'email',
        'mobile',
        'pin',
        'password',
        'status',
        'agent_id',
        'created_by',
    ];

    public function project()
    {
        return $this->belongsTo(ProjectModel::class, 'project_id');
    }

    public function shop()
    {
        return $this->belongsTo(ShopModel::class, 'shop_id');
    }
}