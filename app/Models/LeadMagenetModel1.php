<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadMagenetModel1 extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'lead_magenet1';

    // Fillable fields (jo mass assignable hain)
    protected $fillable = [
        'company_name',
        'company_email',
        'company_email_type',
        'company_phone',
        'company_phone_type',
        'company_address',
        'company_website',
        'company_logo',
        'header_footer_bg_color',
        'button_bg_color',
        'header_footer_text_color',
        'button_text_color',
    ];
}
