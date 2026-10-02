<?php
namespace App\Http\Controllers\rms;
use App\Http\Controllers\Controller;
use App\Models\RentCollectionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    public function __construct()
    {
    }
    public function dashboard(){
        dd('dashboard');
        // return view('rms.dashboard');
        $tenant = Session::get('tenent_login');
        $shop = DB::table('rms_shops')->where('id', $tenant['shop_id'])->first();
        $penalty = DB::table('rms_penalty_setting')->first();
        $totals = DB::table('rms_rentcollection')->selectRaw('
            SUM(gross_due) as total_gross_due,
            SUM(paid_amount) as total_paid_amount,
            SUM(gross_due - paid_amount) as outstanding_balance
        ')->where('tenant_id', $tenant['id'])->first();
        // dd($shop, $penalty);
        return view('rms.pages.rent', compact('tenant', 'shop', 'penalty', 'totals'));
    }
    public function my_payments()
    {
        $tenant = Session::get('tenent_login');
        if (!$tenant) {
            return redirect()->route('rms.tenant-login');
        }
        $requestLists = RentCollectionModel::where('tenant_id', $tenant['id'])
            ->where('shop_id', $tenant['shop_id'])
            ->whereIn('status', [0, 1, 2, 4, 5])
            ->orderBy('id', 'DESC')
            ->paginate(10, ['*'], 'requests_page')
            ->withQueryString();
        $completedLists = RentCollectionModel::where('tenant_id', $tenant['id'])
            ->where('shop_id', $tenant['shop_id'])
            ->where('status', 3)
            ->orderBy('id', 'DESC')
            ->paginate(10, ['*'], 'completed_page')
            ->withQueryString();
        $shop = DB::table('rms_shops')
            ->where('id', $tenant['shop_id'])
            ->first();
        return view('rms.pages.my-payments', compact(
            'requestLists',
            'completedLists',
            'shop'
        ));
    }
    public function rent()
    {
        $tenant = Session::get('tenent_login');
        $shop = DB::table('rms_shops')->where('id', $tenant['shop_id'])->first();
        $penalty = DB::table('rms_penalty_setting')->first();
        $totals = DB::table('rms_rentcollection')->selectRaw('
            SUM(gross_due) as total_gross_due,
            SUM(paid_amount) as total_paid_amount,
            SUM(gross_due - paid_amount) as outstanding_balance
        ')->where('tenant_id', $tenant['id'])->first();
        // dd($shop, $penalty);
        return view('rms.pages.rent', compact('tenant', 'shop', 'penalty', 'totals'));
    }
    public function save_rent(Request $request)
    {
        $tenant = Session::get('tenent_login');
        if (!$tenant) {
            return response()->json([
                'status' => false,
                'message' => 'Tenant session expired.'
            ], 401);
        }
        $request->validate([
            'collection_id' => 'required|integer',
            'paid_amount' => 'required|numeric|min:0.01',
            'payment_mode' => 'required|string|max:50',
            'reference_number' => 'nullable|string|max:255',
            'payment_date' => 'required|date',
            'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'remarks' => 'nullable|string|max:1000',
        ]);
        DB::beginTransaction();
        try {
            /*
            |--------------------------------------------------------------------------
            | Get Rent Collection
            |--------------------------------------------------------------------------
            */
            $collection = DB::table('rms_rentcollection')
                ->where('id', $request->collection_id)
                ->where('tenant_id', $tenant['id'])
                ->where('shop_id', $tenant['shop_id'])
                ->lockForUpdate()
                ->first();
            if (!$collection) {
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => 'Payment request not found.'
                ], 404);
            }
            /*
            |--------------------------------------------------------------------------
            | Do not allow payment on cancelled / fully paid request
            |--------------------------------------------------------------------------
            */
            if (in_array((int) $collection->status, [3, 5])) {
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => (int) $collection->status === 3
                        ? 'This payment request is already fully paid.'
                        : 'This payment request has been cancelled.'
                ], 422);
            }
            /*
            |--------------------------------------------------------------------------
            | Calculate already approved + pending payments
            |--------------------------------------------------------------------------
            |
            | approval_status:
            | 0 = Pending
            | 1 = Approved
            | 2 = Rejected
            |
            */
            $approvedAmount = (float) DB::table('rms_rent_payments')
                ->where('rentcollection_id', $collection->id)
                ->where('approval_status', 1)
                ->sum('payment_amount');
            $pendingAmount = (float) DB::table('rms_rent_payments')
                ->where('rentcollection_id', $collection->id)
                ->where('approval_status', 0)
                ->sum('payment_amount');
            /*
            |--------------------------------------------------------------------------
            | Available outstanding amount
            |--------------------------------------------------------------------------
            */
            $remainingAmount = max(
                0,
                (float) $collection->gross_due
                - $approvedAmount
                - $pendingAmount
            );
            $paymentAmount = (float) $request->paid_amount;
            /*
            |--------------------------------------------------------------------------
            | Overpayment is allowed
            |--------------------------------------------------------------------------
            |
            | You have removed the old restriction, so we do not block:
            |
            | paymentAmount > remainingAmount
            |
            */
            /*
            |--------------------------------------------------------------------------
            | Upload Payment Proof
            |--------------------------------------------------------------------------
            */
            $paymentProof = null;
            if ($request->hasFile('receipt')) {
                $directory = public_path('uploads/rms/payments');
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true);
                }
                $file = $request->file('receipt');
                $fileName = time()
                    . '_'
                    . mt_rand(1000, 9999)
                    . '.'
                    . $file->getClientOriginalExtension();
                $file->move($directory, $fileName);
                $paymentProof = 'uploads/rms/payments/' . $fileName;
            }
            /*
            |--------------------------------------------------------------------------
            | Insert Payment Request
            |--------------------------------------------------------------------------
            */
            $paymentId = DB::table('rms_rent_payments')->insertGetId([
                'rentcollection_id' => $collection->id,
                'tenant_id' => $collection->tenant_id,
                'shop_id' => $collection->shop_id,
                'payment_amount' => $paymentAmount,
                'payment_mode' => $request->payment_mode,
                'reference_number' => $request->reference_number,
                'payment_date' => $request->payment_date,
                /*
                * 0 = Pending Approval
                */
                'approval_status' => 0,
                'approved_by' => null,
                'approved_at' => null,
                'receipt' => null,
                'payment_proof' => $paymentProof,
                'remarks' => $request->remarks,
                'rejection_reason' => null,
                'agent_id' => $collection->agent_id,
                'created_by' => Auth::id(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            /*
            |--------------------------------------------------------------------------
            | Change collection status to Request Sent
            |--------------------------------------------------------------------------
            |
            | IMPORTANT:
            | Do NOT change paid_amount here.
            |
            | Payment is still pending admin approval.
            |
            */
            if ((int) $collection->status === 0) {
                DB::table('rms_rentcollection')
                    ->where('id', $collection->id)
                    ->update([
                        'status' => 1,
                        'updated_at' => now(),
                    ]);
            }
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Payment submitted successfully and sent for administrator approval.',
                'payment_id' => $paymentId
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Unable to submit payment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}