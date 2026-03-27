<?php
namespace App\Http\Controllers;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\Customer;
use App\Models\UserWallet;
use App\Models\PropertyMarket;
use App\Models\PassiveProfitModel;
use App\Models\CommissionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PassiveProfitController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request)
    {
        $lists = PassiveProfitModel::select('tbl_passive_profit.*', 'propertymarkets.property as property_name', DB::raw('(SELECT COUNT(*) FROM tbl_commission WHERE tbl_commission.passive_profit_id = tbl_passive_profit.id) as benificial_count'))
            ->leftjoin('propertymarkets', 'propertymarkets.id', '=', 'tbl_passive_profit.property_id')
            ->orderBy('tbl_passive_profit.id','DESC')->get();
            // dd($lists); benificial users
        return view('passive-profit.index', compact('lists'));
    }
    public function commission_details($profit_id){
        $lists = CommissionModel::select('tbl_commission.*', 'tbl_passive_profit.property_id', 'tbl_passive_profit.amount', 'tbl_passive_profit.max_commission_percentage', 'tbl_passive_profit.total_commission_amount','propertymarkets.property as property_name','users.name as customer_name')
            ->leftjoin('tbl_passive_profit', 'tbl_passive_profit.id', '=', 'tbl_commission.passive_profit_id')
            ->leftjoin('propertymarkets', 'propertymarkets.id', '=', 'tbl_passive_profit.property_id')
            ->leftjoin('users', 'users.id', '=', 'tbl_commission.customer_id')
            ->where('tbl_passive_profit.id', $profit_id)
            ->orderBy('tbl_commission.level','ASC')->get();
        $property = PassiveProfitModel::select(
            'tbl_passive_profit.*',
            'propertymarkets.property as property_name',
            DB::raw('(SELECT COUNT(*) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ') as benificial_count'),
            DB::raw('(SELECT COUNT(*) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ' AND tbl_commission.level = 1) as level1_count'),
            DB::raw('(SELECT COUNT(*) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ' AND tbl_commission.level = 2) as level2_count'),
            DB::raw('(SELECT COUNT(*) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ' AND tbl_commission.level = 3) as level3_count'),
            // Total commission amount per level
            DB::raw('(SELECT SUM(commission_amount) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ' AND tbl_commission.level = 1) as level1_amount'),
            DB::raw('(SELECT SUM(commission_amount) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ' AND tbl_commission.level = 2) as level2_amount'),
            DB::raw('(SELECT SUM(commission_amount) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ' AND tbl_commission.level = 3) as level3_amount'),
            // Total commission percentage per level
            DB::raw('(SELECT SUM(commission_percentage) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ' AND tbl_commission.level = 1) as level1_percentage'),
            DB::raw('(SELECT SUM(commission_percentage) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ' AND tbl_commission.level = 2) as level2_percentage'),
            DB::raw('(SELECT SUM(commission_percentage) FROM tbl_commission WHERE tbl_commission.passive_profit_id = ' . (int) $profit_id . ' AND tbl_commission.level = 3) as level3_percentage')
        )
        ->leftJoin('propertymarkets', 'propertymarkets.id', '=', 'tbl_passive_profit.property_id')
        ->where('tbl_passive_profit.id', $profit_id)
        ->orderBy('tbl_passive_profit.id', 'DESC')
        ->first();
        // dd($property);
        return view('passive-profit.commission-details', compact('lists','property'));
    }
    public function create(Request $request)
    {
        $customers = Customer::where(['status'=>1,'agent_id'=>auth()->user()->id])->where('name', '!=', '')->orderBy('name','ASC')->get();
        $properties = PropertyMarket::select('id', 'property as property_name','status')->where(['status'=> 1,'user_id'=> auth()->user()->id])->where('property', '!=', '')->orderBy('id','DESC')->get();
        // dd($properties);
        return view('passive-profit.create', compact('customers','properties'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_id' => 'required',
            'amount' => 'required|integer',
            'max_commission_percentage' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
        }

        $passive_profit = $request->id? PassiveProfitModel::find($request->id):new PassiveProfitModel();
        $passive_profit->property_id = $request->property_id;
        $passive_profit->amount = $request->amount;
        $passive_profit->max_commission_percentage = $request->max_commission_percentage;
        $passive_profit->total_commission_amount = ($request->max_commission_percentage / 100) * $request->amount;
        $passive_profit->created_by = auth()->user()->id;

        if (!$passive_profit->save()) {
            return response()->json(['status' => false, 'message' => 'Something went wrong while saving passive profit']);
        }

        // Now handle commissions for level 1 to 3
        for ($i = 1; $i <= 3; $i++) {
            $userField = 'level' . $i . '_user_id';
            $commissionField = 'level' . $i . '_commission';

            $userIds = (array) ($request->$userField ?? []);

            $commissions = $request->$commissionField;
            // if ($i == 3) {
            //     dd($commissions);
            //     dd(count($userIds));
            // }
            foreach ($userIds as $userId) {
                $commissionPercent = $commissions ?? 0;
                $level_commission_amount = ($commissionPercent / 100) * $passive_profit->total_commission_amount;
                $commission_amount = $level_commission_amount/count($userIds);
                $commission_percent = $commissionPercent/count($userIds);
                // if ($i == 1) {
                //     dd($commission_percent);
                // }
                if (!$userId || $commission_percent == 0) {
                    // Skip if either user ID or commission is missing
                    continue;
                }
                CommissionModel::where('passive_profit_id', $passive_profit->id)
                    ->where('customer_id', $userId)
                    ->where('level', $i)
                    ->delete(); // Delete existing commission for this user and level

                $commission = new CommissionModel();
                $commission->passive_profit_id = $passive_profit->id;
                $commission->customer_id = $userId;
                $commission->level = $i;
                $commission->commission_percentage = $commission_percent;
                $commission->commission_amount = $commission_amount;
                $commission->created_by = auth()->user()->id;
                $commission->save();
            }
        }

        return redirect()->route('passive-profit.index')->with('success', 'Passive profit created successfully');
    }
    public function edit($id){
        $details = PassiveProfitModel::find($id);
        $customers = Customer::where(['status'=>1,'agent_id'=>auth()->user()->id])->where('name', '!=', '')->orderBy('name','ASC')->get();
        $properties = PropertyMarket::select('id', 'property as property_name','status')->where(['status'=> 1,'user_id'=> auth()->user()->id])->where('property', '!=', '')->orderBy('id','DESC')->get();
        // $commission = CommissionModel::select('*')->where('passive_profit_id', $id)->groupBy('level')->get();
        $commission = DB::table('tbl_commission')
        ->select(
            'level',
            DB::raw('SUM(commission_percentage) as total_percentage'),
            DB::raw('GROUP_CONCAT(customer_id) as customer_ids')
        )
        ->where('passive_profit_id', $id)
        ->groupBy('level')
        ->get();
        $level1 = array();
        $level2 = array();
        $level3 = array();
        foreach ($commission as $key => $value) {
            if($value->level == 1){
                $level1['ids'] = explode(',', $value->customer_ids);
                $level1['percentage'] = $value->total_percentage;
            }elseif($value->level == 2){
                $level2['ids'] = explode(',', $value->customer_ids);
                $level2['percentage'] = $value->total_percentage;
            }elseif($value->level == 3){
                $level3['ids'] = explode(',', $value->customer_ids);
                $level3['percentage'] = $value->total_percentage;
            }
        }
        // dd($level1,$level2,$level3);
        return view('passive-profit.create', compact('customers','properties','details','level1','level2','level3'));
    }
    public function delete($id){
        CommissionModel::where('passive_profit_id', $id)->delete();
        $passive_profit = PassiveProfitModel::find($id);
        if ($passive_profit) {
            $passive_profit->delete();
            return redirect()->back()->with('success', 'Passive profit deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Passive profit not found');
        }
    }
    public function approve($id)
    {
        $agent = auth()->user();
        $totalPayable = DB::table('tbl_commission')->where('passive_profit_id', $id)->sum('commission_amount');
        $passive_data = PassiveProfitModel::findOrFail($id);
        if (!$passive_data) {
            return redirect()->back()->with('error', 'Passive profit not found');
        }else if ($passive_data->status == 1) {
            return redirect()->back()->with('error', 'Passive profit already approved');
        }else if ($passive_data->status == 2) {
            return redirect()->back()->with('error', 'Passive profit already rejected');
        }
        // dd($agent->wallet_balance);
        if ($agent->wallet_balance < $totalPayable) {
            return redirect()->back()->with('error', 'Insufficient balance in your wallet');
        }
        DB::beginTransaction();

        try {
            $commissions = DB::table('tbl_commission')->where('passive_profit_id', $id)->get();
            if ($commissions->isEmpty()) {
                return redirect()->back()->with('error', 'No commissions found for this passive profit');
            }
            foreach ($commissions as $commission) {
                $this->customer_transaction($commission);
            }

            DB::commit();
            // Update passive status
            $passive_data->status = 1;
            $passive_data->save();
            // update commission status
            DB::table('tbl_commission')->where('passive_profit_id', $id)->update(['status' => 1]);
            // Deduct amount from agent's wallet
            $agent->wallet_balance -= $totalPayable;
            $agent->save();
            // Log the transaction
            return redirect()->back()->with('success', 'Commissions approved and transferred successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Commission Approval Failed: ' . $e->getMessage());
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while processing the commissions.');
        }
    }

    public function customer_transaction($commission)
    {
        $agentId = auth()->id();
        $customer = Customer::where(['id' => $commission->customer_id, 'status' => 1])->first();

        if (!$customer || $commission->commission_amount <= 0) {
            return;
        }

        $commissionAmount = $commission->commission_amount;
        $previousBalance = $customer->walletBalance;
        $updatedBalance = $previousBalance + $commissionAmount;

        $userwallet = new UserWallet([
            'txnid'            => 'TXN' . rand(11111111, 99999999),
            'ownerAccount'     => $customer->id,
            'payeeAccount'     => $agentId,
            'txn_type'         => 3,
            'type'             => 1,
            'entryType'        => 'credit',
            'base_amount'      => $commissionAmount,
            'amount'           => $commissionAmount,
            'previousBalance'  => $previousBalance,
            'updatedBalance'   => $updatedBalance,
            'transfer_mode'    => 'commission',
            'comment'          => "Commission of ₹{$commissionAmount} (Level {$commission->level}) credited to your wallet.",
            'payment_data'     => json_encode($commission),
            'status'           => 1,
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);
        $userwallet->save();

        $customer->walletBalance = $updatedBalance;
        $customer->save();
    }

}
