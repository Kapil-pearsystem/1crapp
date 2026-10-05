<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RentPayment extends Model
{
    use HasFactory;
    protected $table = 'rms_rent_payments';
    protected $fillable = [
        'rentcollection_id',
        'tenant_id',
        'shop_id',
        'account_id',
        'payment_amount',
        'payment_mode',
        'reference_number',
        'payment_date',
        'approval_status',
        'approved_by',
        'approved_at',
        'receipt',
        'payment_proof',
        'remarks',
        'rejection_reason',
        'agent_id',
        'created_by',
    ];
    protected $casts = [
        'payment_amount' => 'decimal:2',
        'payment_date' => 'date',
        'approved_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /*
    |--------------------------------------------------------------------------
    | Rent Collection
    |--------------------------------------------------------------------------
    */
    public function rentCollection()
    {
        return $this->belongsTo(
            RentCollectionModel::class,
            'rentcollection_id'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | Tenant
    |--------------------------------------------------------------------------
    */
    public function tenant()
    {
        return $this->belongsTo(
            TenantModel::class,
            'tenant_id'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | Shop
    |--------------------------------------------------------------------------
    */
    public function shop()
    {
        return $this->belongsTo(
            ShopModel::class,
            'shop_id'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | Approval User
    |--------------------------------------------------------------------------
    */
    public function approver()
    {
        return $this->belongsTo(
            User::class,
            'approved_by'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | Status Helpers
    |--------------------------------------------------------------------------
    */
    public function isPending()
    {
        return $this->approval_status == 0;
    }
    public function isApproved()
    {
        return $this->approval_status == 1;
    }
    public function isRejected()
    {
        return $this->approval_status == 2;
    }
}