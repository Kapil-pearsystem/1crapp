<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{

    use HasFactory;
    protected $table = 'user_wallet';
    protected $fillable = ['id', 'txnid', 'txn_type', 'ownerAccount', 'payeeAccount', 'updated_at', 'type', 'entryType', 'base_amount', 'amount', 'previousBalance', 'updatedBalance', 'comment', 'created_at', 'status', 'transfer_mode', 'receipt_url', 'payment_data', 'reject_remark', 'remark', 'admin_remark'];
    public $timestamps = true;
}