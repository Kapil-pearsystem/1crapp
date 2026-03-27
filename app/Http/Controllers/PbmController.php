<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use App\Models\PbmIncomeModel;
use App\Models\PbmSpandableModel;
use App\Models\PbmExpensesModel;

class PbmController extends Controller
{
    public function index()
    {
        return view('front.pbm');
    }
    public function save_income(Request $request){
        $request->validate([
            'income_type'   => 'required|numeric',
            'income_source' => 'required',
            'amount'        => 'required|numeric'
        ]);
        if($request->id){
            $income = PbmIncomeModel::find($request->id);
        }else{
            $income = new PbmIncomeModel();
        }
        $income->agent_id = app('currentAgent')->id;
        $income->user_id = auth()->id();
        $income->income_type = $request->income_type;
        $income->income_source = $request->income_source;
        $income->amount = $request->amount;
        $res = $income->save();
        return response()->json([
            'status' => $res ? true : false
        ]);
    }
    public function get_incomes()
    {
        $active_incomes = PbmIncomeModel::where(['user_id'=> auth()->id(), 'income_type'=>1])->OrderBy('id', 'DESC')->get();
        $passive_incomes = PbmIncomeModel::where(['user_id'=> auth()->id(), 'income_type'=>2])->OrderBy('id', 'DESC')->get();
        $active_sum = PbmIncomeModel::where(['user_id'=> auth()->id(), 'income_type'=>1])->sum('amount');
        $passive_sum = PbmIncomeModel::where(['user_id'=> auth()->id(), 'income_type'=>2])->sum('amount');
        $total_income = PbmIncomeModel::where('user_id', auth()->id())->sum('amount');
        $data = view('front.pbm-incomes', compact('active_incomes', 'passive_incomes', 'active_sum', 'passive_sum', 'total_income'))->render();
        return response()->json([
            'status' => true,
            'total_incomes' => $total_income,
            'data' => $data
        ]);
    }
    public function delete_income($id)
    {
        $delete = PbmIncomeModel::where('id', $id)->where('user_id', auth()->id())->delete();
        return response()->json([
            'status' => $delete ? true : false
        ]);
    }
    public function getIncomeById($id)
    {
        $details = PbmIncomeModel::where('id', $id)->where('user_id', auth()->id())->first();
        return response()->json([
            'status' => true,
            'data'=> $details
        ]);
    }
    public function save_spandable_amount(Request $request){
        $request->validate([
            'esa' => 'required|numeric',
            'ffa' => 'required|numeric',
            'fea' => 'required|numeric',
            'sfa' => 'required|numeric'
        ]);
        if($request->spandable_amount_id){
            $spandable = PbmSpandableModel::find($request->spandable_amount_id);
        }else{
            $spandable = new PbmSpandableModel();
        }
        $spandable->agent_id = app('currentAgent')->id;
        $spandable->user_id = auth()->id();
        $spandable->esa = $request->esa;
        $spandable->ffa = $request->ffa;
        $spandable->fea = $request->fea;
        $spandable->sfa = $request->sfa;
        $res = $spandable->save();
        return response()->json([
            'status' => $res ? true : false
        ]);
    }
    public function get_spandable_amount(Request $request){
        $spandable = PbmSpandableModel::where('user_id', auth()->id())->first();
        $total_income = PbmIncomeModel::where('user_id', auth()->id())->sum('amount');
        if($spandable){
            return response()->json([
                'status' => true,
                'data' => $spandable,
                'total_incomes' => $total_income,
                'msg' => 'Spandable amount found!'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'data' => null,
                'msg' => 'Spandable amount not found!'
            ]);
        }
    }

    public function save_expenses(Request $request){
        $request->validate([
            'expenses_name'   => 'required',
            'spandable_percent' => 'required|numeric',
            'current_amount' => 'required|numeric',
            'required_amount'        => 'required|numeric'
        ]);
        // check total spandable percent
        $total_spandable_percent = PbmExpensesModel::where('user_id', auth()->id())->sum('spandable_percent');
        if(($total_spandable_percent + $request->spandable_percent) > 100){
            return response()->json([
                'status' => false,
                'msg' => 'You have exceeded 100% spandable percent limit!'
            ]);
        }
        // check spandable limit
        $total_income = PbmIncomeModel::where('user_id', auth()->id())->sum('amount');
        $spandable = PbmSpandableModel::where('user_id', auth()->id())->first();
        $total_spandable_amount = 0;
        if($spandable){
            $total_income = $total_income ? $total_income : 1; // to avoid division by zero
            $total_spandable_percent = $spandable->esa + $spandable->ffa + $spandable->fea + $spandable->sfa;
            $total_spandable_amount = $total_income > 0 ? ($total_income * $total_spandable_percent) / 100 : 0;
            
        }
       
        $total_current_amount = PbmExpensesModel::where('user_id', auth()->id())->sum('current_amount');
        if(($total_current_amount + $request->current_amount) > $total_spandable_amount){
            return response()->json([
                'status' => false,
                'msg' => 'You have exceeded your spandable limit!'
            ]);
        }
        if($request->id){
            $expenses = PbmExpensesModel::find($request->id);
        }else{
            $expenses = new PbmExpensesModel();
        }
        $expenses->agent_id = app('currentAgent')->id;
        $expenses->user_id = auth()->id();
        $expenses->expenses_name = $request->expenses_name;
        $expenses->spandable_percent = $request->spandable_percent;
        $expenses->current_amount = $request->current_amount;
        $expenses->required_amount = $request->required_amount;
        $res = $expenses->save();
        return response()->json([
            'status' => $res ? true : false
        ]);
    }
    public function get_expenses()
    {
        $expenses_data = PbmExpensesModel::where(['user_id'=> auth()->id()])->OrderBy('id', 'DESC')->get();
        $total_income = PbmIncomeModel::where('user_id', auth()->id())->sum('amount');
        $spandable = PbmSpandableModel::where('user_id', auth()->id())->first();
        $total_spandable_amount = 0;
        if($spandable){
            $total_income = $total_income ? $total_income : 1; // to avoid division by zero
            $total_spandable_percent = $spandable->esa + $spandable->ffa + $spandable->fea + $spandable->sfa;
            $total_spandable_amount = $total_income > 0 ? ($total_income * $total_spandable_percent) / 100 : 0;
            
        }
        $total_current_amount = PbmExpensesModel::where('user_id', auth()->id())->sum('current_amount');
        $total_required_amount = PbmExpensesModel::where('user_id', auth()->id())->sum('required_amount');
        $total_magic_amount = $total_current_amount-$total_required_amount;
        // return $total_spandable_amount;
        $data = view('front.pbm-expenses', compact('expenses_data', 'total_spandable_amount','total_current_amount','total_required_amount','total_magic_amount'))->render();
        return response()->json([
            'status' => true,
            // 'total_incomes' => $total_income,
            'data' => $data
        ]);
    }
    
    public function get_expenses_by_id($id)
    {
        $details = PbmExpensesModel::where('id', $id)->where('user_id', auth()->id())->first();
        return response()->json([
            'status' => true,
            'data'=> $details
        ]);
    }
    public function delete_expenses($id)
    {
        $delete = PbmExpensesModel::where('id', $id)->where('user_id', auth()->id())->delete();
        return response()->json([
            'status' => $delete ? true : false
        ]);
    }
    public function load_total()
    {
        $total_income = PbmIncomeModel::where('user_id', auth()->id())->sum('amount');
        $spandable = PbmSpandableModel::where('user_id', auth()->id())->first();
        $total_spandable_amount = 0;
        if($spandable){
            $total_income = $total_income ? $total_income : 1; // to avoid division by zero
            $total_spandable_percent = $spandable->esa + $spandable->ffa + $spandable->fea + $spandable->sfa;
            $total_spandable_amount = $total_income > 0 ? ($total_income * $total_spandable_percent) / 100 : 0;
            
        }
        $total_current_amount = PbmExpensesModel::where('user_id', auth()->id())->sum('current_amount');
        $total_required_amount = PbmExpensesModel::where('user_id', auth()->id())->sum('required_amount');
        $total_magic_amount = $total_current_amount-$total_required_amount;
        return response()->json([
            'status' => true,
            'total_spandable_amount'=> $total_spandable_amount,
            'total_current_amount'=> $total_current_amount,
            'total_required_amount'=> $total_required_amount,
            'total_magic_amount'=> $total_magic_amount
        ]);
    }

}