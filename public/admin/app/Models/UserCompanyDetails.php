<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompanyDetails extends Model
{
    use HasFactory;
    protected $table = 'user_company_details';
    protected $fillable = [ 
       'id', 'user_id', 'company_name', 'company_email', 'company_email_type', 'company_phone', 'company_phone_type', 'company_address', 'company_website', 'company_logo', 'status', 'created_at', 'updated_at'
    ];
}

