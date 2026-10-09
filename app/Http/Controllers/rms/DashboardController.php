<?php
namespace App\Http\Controllers\rms;
use App\Http\Controllers\Controller;
use App\Models\RentCollectionModel;
use App\Models\ShopModel;
use App\Models\TenantModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function __construct()
    {
    }
    public function dashboard(Request $request)
    {
        $agentId = app('currentAgent')->id ?? 8;
        $tenant = Session::get('tenent_login');

        if (!$tenant) {
            return redirect()->route('rms.tenant-login');
        }

        $shop = DB::table('rms_shops')
            ->where('id', $tenant['shop_id'])
            ->first();

        if (!$shop) {
            return redirect()->back()->with('error', 'Shop not found.');
        }

        $selectedYear = $request->filled('year')
            ? (int) $request->year
            : now()->year;

        $selectedMonth = $request->filled('month')
            ? (int) $request->month
            : 0;

        $penaltySettings = DB::table('rms_penalty_setting')
            ->where('agent_id', $agentId)
            ->first();

        $isPenaltyOverride = DB::table('rms_tenant_penalty_override')
            ->where([
                'agent_id' => $agentId,
                'tenant_id' => $tenant['id']
            ])
            ->exists();

        $query = RentCollectionModel::with(['electricity', 'shop'])
            ->where('tenant_id', $tenant['id'])
            ->where('shop_id', $tenant['shop_id'])
            ->where('collection_year', $selectedYear);

        if ($selectedMonth > 0) {
            $query->where('collection_month', $selectedMonth);
        }

        $collections = $query
            ->orderByDesc('collection_year')
            ->orderByDesc('collection_month')
            ->orderByDesc('id')
            ->get();

        $collectionIds = $collections->pluck('id')->toArray();

        $payments = DB::table('rms_rent_payments')
            ->whereIn('rentcollection_id', $collectionIds ?: [0])
            ->orderByDesc('id')
            ->get();

        $paymentGroups = $payments->groupBy('rentcollection_id');

        $records = collect();

        foreach ($collections as $collection) {
            $electricityAmount = ($collection->shop && $collection->shop->electricity_applicable)
                ? (float) ($collection->electricity->electricity_cost ?? 0)
                : 0;

            $basicRent = (float) $collection->basic_rent;
            $cleaningCost = (float) $collection->cleaning_cost;

            $baseAmount = $basicRent + $cleaningCost + $electricityAmount;

            $collectionPayments = $paymentGroups->get($collection->id, collect());

            $approvedAmount = (float) $collectionPayments
                ->where('approval_status', 1)
                ->sum('payment_amount');

            $pendingAmount = (float) $collectionPayments
                ->where('approval_status', 0)
                ->sum('payment_amount');

            $rejectedAmount = (float) $collectionPayments
                ->where('approval_status', 2)
                ->sum('payment_amount');

            $penalty = 0;

            if (!$isPenaltyOverride && $penaltySettings) {
                $dueDate = $collection->shop->due_day ?? null;

                $penaltyBase = max(0, $baseAmount - $approvedAmount);

                $penalty = calculateRentPenalty(
                    $penaltyBase,
                    $dueDate,
                    $penaltySettings,
                    $collection->collection_year,
                    $collection->collection_month
                );
            }

            $totalDue = $baseAmount + $penalty;
            $outstanding = max(0, $totalDue - $approvedAmount);

            $records->push([
                'id' => $collection->id,
                'year' => $collection->collection_year,
                'month' => $collection->collection_month,
                'month_name' => date('F', mktime(0, 0, 0, $collection->collection_month, 1)),
                'basic_rent' => $basicRent,
                'cleaning_cost' => $cleaningCost,
                'electricity' => $electricityAmount,
                'base_amount' => $baseAmount,
                'penalty' => $penalty,
                'total_due' => $totalDue,
                'approved_amount' => $approvedAmount,
                'pending_amount' => $pendingAmount,
                'rejected_amount' => $rejectedAmount,
                'outstanding' => $outstanding,
                'status' => (int) $collection->status,
                'created_at' => $collection->created_at,
                'payments' => $collectionPayments,
            ]);
        }

        $totals = [
            'total_due' => $records->sum('total_due'),
            'total_paid' => $records->sum('approved_amount'),
            'total_pending' => $records->sum('pending_amount'),
            'total_penalty' => $records->sum('penalty'),
            'total_outstanding' => $records->sum('outstanding'),
            'total_requests' => $records->count(),
        ];

        $recentPaymentsQuery = DB::table('rms_rent_payments as p')
            ->join('rms_rentcollection as r', 'r.id', '=', 'p.rentcollection_id')
            ->where('p.tenant_id', $tenant['id'])
            ->where('p.shop_id', $tenant['shop_id'])
            ->where('r.collection_year', $selectedYear);

        if ($selectedMonth > 0) {
            $recentPaymentsQuery->where('r.collection_month', $selectedMonth);
        }

        $recentPayments = $recentPaymentsQuery
            ->select(
                'p.*',
                'r.collection_year',
                'r.collection_month'
            )
            ->orderByDesc('p.id')
            ->limit(10)
            ->get();

        $years = RentCollectionModel::where('tenant_id', $tenant['id'])
            ->where('shop_id', $tenant['shop_id'])
            ->select('collection_year')
            ->distinct()
            ->orderByDesc('collection_year')
            ->pluck('collection_year');

        if (!$years->contains($selectedYear)) {
            $years->prepend($selectedYear);
        }

        $statusLabels = [
            0 => 'Pending Request',
            1 => 'Request Sent',
            2 => 'Partially Paid',
            3 => 'Fully Paid',
            4 => 'Overdue',
            5 => 'Cancelled',
        ];

        $statusColors = [
            0 => 'bg-g-dark',
            1 => 'bg-g-blue',
            2 => 'bg-g-orange',
            3 => 'bg-g-green',
            4 => 'bg-g-pink',
            5 => 'bg-g-grey',
        ];

        return view('rms.pages.dashboard', compact(
            'tenant',
            'shop',
            'penaltySettings',
            'isPenaltyOverride',
            'selectedYear',
            'selectedMonth',
            'years',
            'records',
            'totals',
            'recentPayments',
            'statusLabels',
            'statusColors'
        ));
    }
    public function my_payments()
    {
        $agent_id = app('currentAgent')->id??8;
        $tenant = Session::get('tenent_login');
        if (!$tenant) {
            return redirect()->route('rms.tenant-login');
        }
        $requestLists = RentCollectionModel::with(['electricity', 'shop'])->where('tenant_id', $tenant['id'])
            ->where('shop_id', $tenant['shop_id'])
            ->whereIn('status', [0, 1, 2, 4, 5])
            ->orderBy('id', 'DESC')
            ->paginate(10, ['*'], 'requests_page')
            ->withQueryString();
        // $completedLists = RentCollectionModel::with(['electricity', 'shop'])->where('tenant_id', $tenant['id'])
        //     ->where('shop_id', $tenant['shop_id'])
        //     ->where('status', 3)
        //     ->orderBy('id', 'DESC')
        //     ->paginate(10, ['*'], 'completed_page')
        //     ->withQueryString();
        $completedLists = RentCollectionModel::with([
            'electricity',
            'shop'
        ])
        ->withSum([
            'payments as approved_payment_amount' => function ($query) {
                $query->where('approval_status', 1);
            }
        ], 'payment_amount')
        ->where('tenant_id', $tenant['id'])
        ->where('shop_id', $tenant['shop_id'])
        ->where('status', 3)
        ->orderBy('id', 'DESC')
        ->paginate(10, ['*'], 'completed_page')
        ->withQueryString();
        // dd($completedLists);
        $shop = DB::table('rms_shops')
            ->where('id', $tenant['shop_id'])
            ->first();
        if (!$shop) {
            return redirect()->back()->with('error', 'Shop not found.');
        }
        $account = DB::table('rms_accounts')
            ->where('id', $shop->account_id)
            ->first();
            
        $penaltySettings = DB::table('rms_penalty_setting')->where('agent_id', $agent_id)->first();
        $isPenaltyOverride = DB::table('rms_tenant_penalty_override')->where(['agent_id' => $agent_id, 'tenant_id' => $tenant['id']])->exists();
        // dd($isPenaltyOverride);
        // dd($account);
        return view('rms.pages.my-payments', compact(
            'requestLists',
            'completedLists',
            'shop',
            'penaltySettings',
            'account',
            'isPenaltyOverride'
        ));
    }
    public function payment_history($id)
    {
        $agentId = app('currentAgent')->id ?? 8;
        $tenant = Session::get('tenent_login');

        if (!$tenant) {
            return response()->json(['status' => false, 'message' => 'Tenant session expired.'], 401);
        }

        $collection = RentCollectionModel::with(['electricity', 'shop'])
            ->where('id', $id)
            ->where('tenant_id', $tenant['id'])
            ->where('shop_id', $tenant['shop_id'])
            ->first();

        if (!$collection) {
            return response()->json(['status' => false, 'message' => 'Payment request not found.'], 404);
        }

        $penaltySettings = DB::table('rms_penalty_setting')
            ->where('agent_id', $agentId)
            ->first();

        $isPenaltyOverride = DB::table('rms_tenant_penalty_override')
            ->where([
                'agent_id' => $agentId,
                'tenant_id' => $tenant['id']
            ])
            ->exists();

        $electricityAmount = ($collection->shop && $collection->shop->electricity_applicable)
            ? (float) ($collection->electricity->electricity_cost ?? 0)
            : 0;

        $baseAmount = (float) $collection->basic_rent
            + (float) $collection->cleaning_cost
            + $electricityAmount;

        $paidAmount = (float) $collection->paid_amount;

        $penaltyBase = max(0, $baseAmount - $paidAmount);

        $penalty = 0;

        if (!$isPenaltyOverride) {
            $dueDate = $collection->shop->due_day ?? null;

            $penalty = calculateRentPenalty(
                $penaltyBase,
                $dueDate,
                $penaltySettings,
                $collection->collection_year,
                $collection->collection_month
            );
        }

        $totalDue = $baseAmount + $penalty;

        $payments = DB::table('rms_rent_payments')
            ->where('rentcollection_id', $collection->id)
            ->orderBy('id', 'DESC')
            ->get();

        $approvedAmount = (float) $payments->where('approval_status', 1)->sum('payment_amount');
        $pendingAmount = (float) $payments->where('approval_status', 0)->sum('payment_amount');

        $outstanding = max(0, $totalDue - $approvedAmount);

        return response()->json([
            'status' => true,
            'collection' => [
                'id' => $collection->id,
                'gross_due' => $totalDue,
                'base_amount' => $baseAmount,
                'penalty' => $penalty,
                'paid_amount' => $approvedAmount,
                'pending_amount' => $pendingAmount,
                'outstanding' => $outstanding,
                'collection_year' => $collection->collection_year,
                'collection_month' => $collection->collection_month,
            ],
            'payments' => $payments
        ]);
    }
    public function my_property()
    {
        $tenant = Session::get('tenent_login');
        $shop = DB::table('rms_shops')->where('id', $tenant['shop_id'])->first();
        $agent_id = app('currentAgent')->id??8;
        $penalty = DB::table('rms_penalty_setting')->where('agent_id', $agent_id)->first();
        $totals = DB::table('rms_rentcollection')->selectRaw('
            SUM(gross_due) as total_gross_due,
            SUM(paid_amount) as total_paid_amount,
            SUM(gross_due - paid_amount) as outstanding_balance
        ')->where('tenant_id', $tenant['id'])->first();
        // dd($shop, $penalty);
        return view('rms.pages.my-property', compact('tenant', 'shop', 'penalty', 'totals'));
    }
    public function save_rent(Request $request)
    {
        $agentId = app('currentAgent')->id??8;
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
            $shop = ShopModel::select('id', 'shop_name', 'account_id')->where('agent_id', $agentId)
            ->find($collection->shop_id);
            $paymentId = DB::table('rms_rent_payments')->insertGetId([
                'rentcollection_id' => $collection->id,
                'tenant_id' => $collection->tenant_id,
                'account_id' => $shop->account_id,
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

    public function profile(){
        $user = Session::get('tenent_login');
        $tenant = TenantModel::find($user['id']);
        return view('rms.pages.profile', compact('tenant'));
    }
    public function updateProfile(Request $request)
    {
        $user = Session::get('tenent_login');
        $tenant = TenantModel::find($user['id']);

        // Uniqueness is checked only when the value is actually being changed,
        // and only inside the same project. This avoids false errors when the
        // same person has more than one tenant row (e.g. multiple shops).
        $emailRules = ['required', 'email', 'max:255'];
        if ($request->email !== $tenant->email) {
            $emailRules[] = Rule::unique('rms_tenants', 'email')
                ->where('project_id', $tenant->project_id)
                ->ignore($tenant->id);
        }

        $mobileRules = ['required', 'digits:10'];
        if ($request->mobile !== $tenant->mobile) {
            $mobileRules[] = Rule::unique('rms_tenants', 'mobile')
                ->where('project_id', $tenant->project_id)
                ->ignore($tenant->id);
        }

        $data = $request->validate([
            'name'   => ['required', 'string', 'max:255'],
            'email'  => $emailRules,
            'mobile' => $mobileRules,
        ]);
        // Profile image: upload new / remove existing
        if ($request->hasFile('profile')) {
            $this->deleteProfileFile($tenant->profile);
 
            $file     = $request->file('profile');
            $fileName = 'tenant_' . $tenant->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/tenant_profiles'), $fileName);
 
            $data['profile'] = asset('uploads/tenant_profiles/' . $fileName);
        } elseif ($request->boolean('remove_profile')) {
            $this->deleteProfileFile($tenant->profile);
            $data['profile'] = null;
        } else {
            unset($data['profile']); // keep the existing image
        }

        $tenant->update($data);

        return redirect()->route('rms.profile')
            ->with('success', 'Profile updated successfully.');
    }
    private function deleteProfileFile(?string $path): void
    {
        if ($path && file_exists(public_path($path))) {
            @unlink(public_path($path));
        }
    }
    public function change_pin(){
        return view('rms.pages.pin');
    }
    public function updatePin(Request $request)
    {
        $user = Session::get('tenent_login');
        $tenant = TenantModel::find($user['id']);
 
        $request->validate([
            'current_pin' => ['required', 'digits:4'],
            'pin'         => ['required', 'digits:4', 'confirmed', 'different:current_pin'],
        ], [
            'pin.different' => 'New PIN must be different from the current PIN.',
        ]);
 
        // Supports both hashed and plain-text stored PINs
        $stored = (string) $tenant->pin;
        $isHashed = password_get_info($stored)['algoName'] !== 'unknown';
        $valid  = $isHashed
            ? Hash::check($request->current_pin, $stored)
            : hash_equals($stored, $request->current_pin);
 
        if (! $valid) {
            return back()->withErrors(['current_pin' => 'Current PIN is incorrect.']);
        }
 
        // If your login compares the PIN as plain text, use $request->pin instead of Hash::make(...)
        $tenant->update(['pin' => $request->pin, 'password'=>Hash::make($request->pin)]);
 
        return redirect()->route('rms.pin')
            ->with('success', 'PIN updated successfully.');
    }
}