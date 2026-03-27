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
    public $timestamps = true; // If your table includes `created_at` and `updated_at`

    // Fillable properties
    protected $fillable = [
        'category', 'link_name', 'photo', 'email', 'first_name', 'last_name',
        'chatboat', 'r_bot', 'organization', 'title', 'telephone', 'website',
        'facebook', 'linkedin', 'whatsapp', 'instagram', 'twitter', 'city',
        'state', 'country', 'smstemplate', 'scanning_popup', 'contact_popup',
        'status', 'created_by'
    ];

    // Optional: Disable incrementing if necessary
    // public $incrementing = false;
}
