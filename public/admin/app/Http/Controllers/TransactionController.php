<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\Customer;
use App\Models\Subscription;
use App\Models\Payment;
use App\Models\SubscriptionPlan;
use App\Models\PlanFeature; 
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Razorpay\Api\Api;
use Carbon\Carbon;
// use App\Helper\Helper as Helper;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:reward-list', ['only' => ['payReward']]);
        $this->middleware('permission:transaction-list', ['only' => ['index']]);
        $this->middleware('permission:affiliate-commission-list', ['only' => ['affiliateSetting','store', 'updateStatus']]);
        $this->middleware('permission:billing', ['only' => ['billinglist','detail','planlist','buyfreeplan','upgrade']]); 
        
    
    
    }


   
   public function index()
    {
        $user_id = Auth()->user()->id;
        $role_id = Auth()->user()->role_id;
        if($role_id==1 || Auth()->user()->added_by ==1){
            $billing = UserWallet::join('agents','user_wallet.ownerAccount','agents.id')->join('transaction_type','user_wallet.type','transaction_type.type')->select('user_wallet.*','agents.first_name','agents.last_name','agents.company_id','transaction_type.title')->get();
       
        }else{
            $billing = UserWallet::join('agents','user_wallet.ownerAccount','agents.id')->join('transaction_type','user_wallet.type','transaction_type.type')->select('user_wallet.*','agents.first_name','agents.last_name','agents.company_id','transaction_type.title')->where('ownerAccount',$user_id)->get();
       
        }
         return view('transactions.index', ['admin' => 0,'billing'=>$billing]);
    }

    
      /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    public function payReward(Request $request)
    {
         // Validations
        $request->validate([ 
            'id'       =>  'required|numeric',
        ]);


        DB::beginTransaction();
        try {
            // Delete User
            $userwallet = UserWallet::whereId($request->id)->first();
            $userwallet->status = 1;
            $userwallet->save();
            
            $userData = User::whereId($userwallet->ownerAccount)->first();

            DB::commit();
            return redirect()->route('affiliatesmanagement.rewardlisting')->with('success', 'Amount Paid Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
     
    public function billinglist()
    {
        $user_id = Auth()->user()->id;
        $billing = Subscription::where('user_id',$user_id)->get();
        return view('billing.index', ['admin' => 0,'billing'=>$billing]);
    }

 
    public function upgrade(Request $request) {
        $input = $request->all();
        $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
             DB::beginTransaction();
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                
                $description = explode('||',$response['description']);
                $plan_name = $description[0];
                $plan_id = $description[1];
                $payment = Payment::create([
                    'user_id' => Auth()->user()->id,
                    'plan_id' => $plan_id,
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $response['amount']/100,
                    'json_response' => json_encode((array)$response),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                 
                
                $Subscription = new Subscription();
                $Subscription->user_id = Auth()->user()->id;
                $Subscription->plan = $plan_id;
                $Subscription->product = $plan_name;
                $Subscription->amount = $response['amount']/100;
                $Subscription->reference_no = $input['razorpay_payment_id'];
                $Subscription->payment_mode = $response['method'];
                $Subscription->created_at = now();
                $Subscription->save();
                  

                $userwallet = new UserWallet;
                $userwallet->txnid =  'TXN'.rand(11111111,99999999);
                $userwallet->ownerAccount = Auth()->user()->id;
                $userwallet->payeeAccount = 1;
                $userwallet->type = 2;
                $userwallet->entryType = 'debit';
                $userwallet->base_amount = $response['amount']/100;
                $userwallet->amount = $response['amount']/100;
                $userwallet->previousBalance =1;
                $userwallet->updatedBalance = 1; 
                $userwallet->transfer_mode = 'online razorpay'; 
                $userwallet->payment_data = json_encode($response); 
                $userwallet->status = 1;
                $userwallet->created_at = 1;
                $userwallet->updated_at = 1;
                $userwallet->save();
                
                 DB::commit();
                 
            } catch(\Throwable $e) {
                 DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        //Session::put('success','Payment Successful');
        return redirect()->back()->with('success', 'Subscription Upgraded Successfully!');
    }
    public function upgrade_agent_plan(Request $request){
            $input = $request->all();
            $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            if (!empty($input['razorpay_payment_id'])) {

                DB::beginTransaction();

                try {
                    $payment = $api->payment->fetch($input['razorpay_payment_id']);
                    $response = $payment->capture(['amount' => $payment['amount']]);
                    $description = explode('||', $response['description']);
                    $plan_name = $description[0];
                    $plan_id   = $description[1];
                    $amount    = $response['amount'] / 100;

                    $planType = $payment['notes']['plan_type'] ?? null;
                    $agent_id = $payment['notes']['agent_id'] ?? null;
                    // dd($agent_id);
                    $subscription_plan = SubscriptionPlan::find($plan_id);

                    // Get existing agent
                    $agent = DB::table('agents')->where('id', $agent_id)->first();
                    if(is_null($agent)){
                        return redirect()->back()->with('error', 'No agent found!');
                    }
                    $validUpto = Carbon::now();

                    // If current plan still active → extend from that date
                    if ($agent->valid_upto && Carbon::parse($agent->valid_upto)->isFuture()) {
                        $validUpto = Carbon::parse($agent->valid_upto);
                    }

                    if ($planType === 'monthly') {
                        $validUpto->addMonth();
                    } elseif ($planType === 'yearly') {
                        $validUpto->addYear();
                    }
                    // dd($validUpto);
                    // active for trial duration for already have plan also
                    // $validUpto->addDays($subscription_plan->trial_duration);

                    // ✅ Update agent validity
                    DB::table('agents')
                        ->where('id', $agent->id)
                        ->update([
                            'valid_upto' => $validUpto,
                            'updated_at' => now(),
                        ]);

                    // ✅ Update plan in agent_details
                    DB::table('agent_details')
                        ->where('user_id', $agent->id)
                        ->update([
                            'package'    => $plan_id,
                            'updated_at' => now(),
                        ]);

                    // ✅ Save payment
                    Payment::create([
                        'user_id'        => $agent->id,
                        'plan_id'        => $plan_id,
                        'r_payment_id'   => $response['id'],
                        'method'         => $response['method'],
                        'currency'       => $response['currency'],
                        'user_email'     => $response['email'],
                        'amount'         => $amount,
                        'json_response'  => json_encode((array)$response),
                        'created_at'     => now(),
                        'updated_at'     => now()
                    ]);

                    // ✅ Save subscription
                    Subscription::create([
                        'user_id'       => $agent->id,
                        'plan'          => $plan_id,
                        'product'       => $plan_name,
                        'amount'        => $amount,
                        'reference_no'  => $input['razorpay_payment_id'],
                        'payment_mode'  => $response['method'],
                        'created_at'    => now()
                    ]);

                    // ✅ Wallet entry
                    UserWallet::create([
                        'txnid'           => 'TXN'.rand(11111111,99999999),
                        'ownerAccount'    => $agent->id,
                        'payeeAccount'    => Auth()->user()->id,
                        'type'            => 2,
                        'entryType'       => 'debit',
                        'base_amount'     => $amount,
                        'amount'          => $amount,
                        'previousBalance' => 0,
                        'updatedBalance'  => 0,
                        'transfer_mode'   => 'online razorpay',
                        'payment_data'    => json_encode($payment),
                        'status'          => 1,
                        'created_at'      => now(),
                        'updated_at'      => now()
                    ]);

                    DB::commit();

                } catch (\Throwable $e) {

                    DB::rollBack();
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
        return redirect()->back()->with('success', 'Plan upgraded successfully!');
    }


    public function planlist()
    {
        $user_id = Auth()->user()->id;
         $subscription_plan = SubscriptionPlan::get(); 
         $plan_feature = PlanFeature::get(); 
        return view('billing.plan-popup', ['admin' => 0,'subscription_plan'=>$subscription_plan,'plan_feature'=>$plan_feature]);
    }
    
    
    public function buyfreeplan(Request $request) {
        $input = $request->all();
        $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET')); 
             DB::beginTransaction();
            try { 
                 
                $plan_name = $input['description'];
                $plan_id = $input['plan_id'];
                $payment = Payment::create([
                    'user_id' => Auth()->user()->id,
                    'plan_id' => $plan_id,
                    'r_payment_id' => 0,
                    'method' => 'online',
                    'currency' => 'INR',
                    'user_email' => Auth()->user()->email,
                    'amount' => 0,
                    'json_response' => '',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                 
                
                $Subscription = new Subscription();
                $Subscription->user_id = Auth()->user()->id;
                $Subscription->plan = $plan_id;
                $Subscription->product = $plan_name;
                $Subscription->amount = 0;
                $Subscription->reference_no = rand(11111111,99999999);
                $Subscription->payment_mode = 'online';
                $Subscription->created_at = now();
                $Subscription->save();
                
                 DB::commit();
                 
            } catch(\Throwable $e) {
                 DB::rollBack();
                return redirect()->back()->with('error', $e->getMessage());
            }
        
        //Session::put('success','Payment Successful');
        return redirect()->back()->with('success', 'Subscription Upgraded Successfully!');
    }
   
    public function detail($id)
    {
        $user_id = Auth()->user()->id;
        $billing = Subscription::where('id',$id)->first();
        return view('billing.detail', ['admin' => 0,'billing'=>$billing]);
    }

    public function txndetail($id)
    {
        $user_id = Auth()->user()->id; 
        $billing = UserWallet::join('agents','user_wallet.ownerAccount','agents.id')->join('transaction_type','user_wallet.type','transaction_type.type')->select('user_wallet.*','agents.first_name','agents.last_name','agents.company_id','transaction_type.title')->where('user_wallet.id',$id)->first();
       
       
        return view('transactions.detail', ['admin' => 0,'billing'=>$billing]);
    }


    

}
