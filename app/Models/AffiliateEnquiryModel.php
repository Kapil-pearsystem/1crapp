<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateEnquiryModel extends Model
{
    protected $table = 'tbl_affiliate_enquiry';

    protected $fillable = [
        'agent_id',
        'first_name',
        'email',
        'contact_no',
        'monthly_referrals',
        'message'
    ];
}
