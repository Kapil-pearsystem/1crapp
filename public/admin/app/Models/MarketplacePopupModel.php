<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplacePopupModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_property_marketplace_popup_details';

    protected $primaryKey = 'id';

    // public $timestamps = true;

    protected $fillable = [
        'property_id',
        'title',
        'cta_title',
        'vid_link',
        'bullet1',
        'bullet2',
        'bullet3',
        'bullet4',
        'bullet5',
        'bullet6',
        'form_source',
        'created_by',
    ];
}
