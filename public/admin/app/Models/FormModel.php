<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_form';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'form_name',
        'tag_id',
        'list_id',
        'sequence_id',
        'sts_visible',
        'source_id',
        'title',
        'title_visible',
        'welcome_email',
        'we_visible',
        'cod_visible',
        'ps_visible',
        'phone_visible',
        'msgbox_visible',
        'drivefile_id',
        'df_visible',
        'forword_email',
        'fe_visible',
        'cta_title',
        'success_destination',
        'status',
        'created_by',
    ];
}
