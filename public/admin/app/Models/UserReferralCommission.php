<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReferralCommission extends Model
{

    use HasFactory;
    protected $table = 'tbl_referral_commission';
    public $timestamps = true;
}