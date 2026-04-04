<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CdbMailTemp extends Model
{
    protected $table = 'cdb_mail_temp';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'title',
        'celebration_text',
        'subject',
        'content',
        'logo',
        'attachment',
        'cc_mailid',
        'status',
    ];
}