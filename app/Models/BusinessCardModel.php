<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCardModel extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'tbl_businesscard';

    // Primary key
    protected $primaryKey = 'id';

    // Timestamps
    public $timestamps = true; 

    // Fillable properties
    protected $fillable = [
        'category', 'link_name', 'link_slug', 'layout', 'photo', 'email', 'first_name', 'last_name',
        'designation', 'chatboat', 'r_bot', 'organization', 'title', 'telephone', 'website',
        'facebook', 'linkedin', 'whatsapp', 'instagram', 'twitter', 'city',
        'state', 'country','address', 'smstemplate', 'scanning_popup', 'contact_popup',
        'status', 'created_by'
    ];

    // Optional: Disable incrementing if necessary
    // public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->category = 2;
        });
    }
}
