<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AccountModel extends Model
{
    protected $table = 'rms_accounts';
    protected $fillable = [
        'account_holder_name',
        'bank_name',
        'account_no',
        'ifsc_code',
        'account_type',
        'upi_id',
        'upi_name',
        'barcode_file',
        'status',
        'agent_id',
        'created_by',
    ];
}