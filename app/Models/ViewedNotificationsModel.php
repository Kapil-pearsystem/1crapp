<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewedNotificationsModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_viewed_notifications';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'type',
        'user_id',
        'notification_id',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
