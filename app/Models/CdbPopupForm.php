<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CdbPopupForm extends Model
{
    protected $table = 'cdb_popup_form';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'mail_temp_id',
        'title',
        'form_source',
        'contact_field',
        'msg_field',
        'content',
        'file_path',
        'cta_btn_text',
        'thankyou_message',
        'image_visible',
        'thankyou_cta_link',
        'thankyou_cta_text'
    ];

    // 🔥 Relation with Mail Template
    public function mailTemplate()
    {
        return $this->belongsTo(CdbMailTemp::class, 'mail_temp_id');
    }

    // 🔥 Relation with User (optional)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}