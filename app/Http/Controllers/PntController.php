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
use App\Models\PNTModel;
use App\Models\PntLiabilityModel;
use App\Models\PntCashFlowModel;
use App\Models\PntDateModel;

class PntController extends Controller
{
    public function index()
    {
        return view('front.pnt');
    }
   public function save_pnt(Request $request)
    {
        $request->validate([
            'asset_name'        => 'required',
            'last_year_amount'  => 'required|numeric',
            'this_year_amount'  => 'required|numeric',
            'current_amount'    => 'required|numeric',
        ]);
        if($request->id){
            $assets = PNTModel::find($request->id);
        }else{
            $assets = new PNTModel();
        }
        $assets->agent_id = app('currentAgent')->id;
        $assets->user_id = auth()->id();
        $assets->asset_name = $request->asset_name;
        $assets->last_year_amount = $request->last_year_amount;
        $assets->this_year_amount = $request->this_year_amount;
        $assets->current_amount = $request->current_amount;
        $res = $assets->save();
        return response()->json([
            'status' => $res ? true : false
        ]);
    }
    public function pnt_assets()
    {
        $assets = PNTModel::where('user_id', auth()->id())->get();
        $data = view('front.pnt-assets', compact('assets'))->render();
        return response()->json([
            'status' => true,
            'last_year_amount' => PNTModel::where('user_id', auth()->id())->sum('last_year_amount'),
            'this_year_amount' => PNTModel::where('user_id', auth()->id())->sum('this_year_amount'),
            'current_amount' => PNTModel::where('user_id', auth()->id())->sum('current_amount'),
            'status' => true,
            'data' => $data
        ]);
    }
    public function delete_pnt_asset($id)
    {
        $delete = PNTModel::where('id', $id)->where('user_id', auth()->id())->delete();
        return response()->json([
            'status' => $delete ? true : false
        ]);
    }
    public function getAssetById($id)
    {
        $details = PNTModel::where('id', $id)->where('user_id', auth()->id())->first();
        return response()->json([
            'status' => true,
            'data'=> $details
        ]);
    }
    public function save_liability(Request $request)
    {
        $request->validate([
            'liability_name'        => 'required',
            'last_year_amount'  => 'required|numeric',
            'this_year_amount'  => 'required|numeric',
            'current_amount'    => 'required|numeric',
        ]);
        if($request->id){
            $liability = PntLiabilityModel::find($request->id);
        }else{
            $liability = new PntLiabilityModel();
        }
        $liability->agent_id = app('currentAgent')->id;
        $liability->user_id = auth()->id();
        $liability->liability_name = $request->liability_name;
        $liability->last_year_amount = $request->last_year_amount;
        $liability->this_year_amount = $request->this_year_amount;
        $liability->current_amount = $request->current_amount;
        $res = $liability->save();
        return response()->json([
            'status' => $res ? true : false
        ]);
    }
    public function get_liability()
    {
        $liabilities = PntLiabilityModel::where('user_id', auth()->id())->get();
        $data = view('front.pnt-liability', compact('liabilities'))->render();
        return response()->json([
            'status' => true,
            'last_year_amount' => PntLiabilityModel::where('user_id', auth()->id())->sum('last_year_amount'),
            'this_year_amount' => PntLiabilityModel::where('user_id', auth()->id())->sum('this_year_amount'),
            'current_amount' => PntLiabilityModel::where('user_id', auth()->id())->sum('current_amount'),
            'status' => true,
            'data' => $data
        ]);
    }
    public function getLiabilityById($id)
    {
        $details = PntLiabilityModel::where('id', $id)->where('user_id', auth()->id())->first();
        return response()->json([
            'status' => true,
            'data'=> $details
        ]);
    }
    public function delete_pnt_liability($id)
    {
        $delete = PntLiabilityModel::where('id', $id)->where('user_id', auth()->id())->delete();
        return response()->json([
            'status' => $delete ? true : false
        ]);
    }
    public function get_networth(){
        return response()->json([
            'status' => true,
            'last_year_amount' => PNTModel::where('user_id', auth()->id())->sum('last_year_amount') - PntLiabilityModel::where('user_id', auth()->id())->sum('last_year_amount'),
            'this_year_amount' => PNTModel::where('user_id', auth()->id())->sum('this_year_amount') - PntLiabilityModel::where('user_id', auth()->id())->sum('this_year_amount'),
            'current_amount' => PNTModel::where('user_id', auth()->id())->sum('current_amount') - PntLiabilityModel::where('user_id', auth()->id())->sum('current_amount'),
            'status' => true,
        ]);
    }
    // save cash flow
    public function save_cashflow(Request $request)
    {
        
        $request->validate([
            'cashflow_name'     => 'required',
            'last_year_amount'  => 'required|numeric',
            'this_year_amount'  => 'required|numeric',
            'current_amount'    => 'required|numeric',
        ]);
        // dd($request->all());
        if($request->id){
            $cashflow = PntCashFlowModel::find($request->id);
        }else{
            $cashflow = new PntCashFlowModel();
        }
        
        $cashflow->agent_id = app('currentAgent')->id;
        $cashflow->user_id = auth()->id();
        $cashflow->cashflow_name = $request->cashflow_name;
        $cashflow->last_year_amount = $request->last_year_amount;
        $cashflow->this_year_amount = $request->this_year_amount;
        $cashflow->current_amount = $request->current_amount;
        // dd($cashflow);
        $res = $cashflow->save();
        return response()->json([
            'status' => $res ? true : false
        ]);
    }
    public function get_cashflow()
    {
        $cashflows = PntCashFlowModel::where('user_id', auth()->id())->get();
        $data = view('front.pnt-cashflow', compact('cashflows'))->render();
        return response()->json([
            'status' => true,
            'last_year_amount' => PntCashFlowModel::where('user_id', auth()->id())->sum('last_year_amount'),
            'this_year_amount' => PntCashFlowModel::where('user_id', auth()->id())->sum('this_year_amount'),
            'current_amount' => PntCashFlowModel::where('user_id', auth()->id())->sum('current_amount'),
            'status' => true,
            'data' => $data
        ]);
    }
    public function getCashflowById($id)
    {
        $details = PntCashFlowModel::where('id', $id)->where('user_id', auth()->id())->first();
        return response()->json([
            'status' => true,
            'data'=> $details
        ]);
    }
    
    public function delete_cashflow($id)
    {
        $delete = PntCashFlowModel::where('id', $id)->where('user_id', auth()->id())->delete();
        return response()->json([
            'status' => $delete ? true : false
        ]);
    }

    // pnt dates
    public function save_pnt_dates(Request $request)
    {
        
        $request->validate([
            'last_year_date'  => 'required|date',
            'this_year_date'  => 'required|date',
            'current_year_date'    => 'required|date',
        ]);
        // dd($request->all());
        if($request->id){
            $pntdates = PntDateModel::find($request->id);
        }else{
            $pntdates = new PntDateModel();
        }
        
        $pntdates->agent_id = app('currentAgent')->id;
        $pntdates->user_id = auth()->id();
        $pntdates->last_year_date = $request->last_year_date;
        $pntdates->this_year_date = $request->this_year_date;
        $pntdates->current_year_date = $request->current_year_date;
        // dd($cashflow);
        $res = $pntdates->save();
        return response()->json([
            'status' => $res ? true : false
        ]);
    }
    public function get_pnt_dates()
    {
        $data = PntDateModel::where('user_id', auth()->id())->first();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    public function getChartsData()
    {
        $userId = auth()->id();

        $assets = [
            PNTModel::where('user_id', $userId)->sum('last_year_amount'),
            PNTModel::where('user_id', $userId)->sum('this_year_amount'),
            PNTModel::where('user_id', $userId)->sum('current_amount'),
        ];

        $liability = [
            PntLiabilityModel::where('user_id', $userId)->sum('last_year_amount'),
            PntLiabilityModel::where('user_id', $userId)->sum('this_year_amount'),
            PntLiabilityModel::where('user_id', $userId)->sum('current_amount'),
        ];

        $cashflow = [
            PntCashFlowModel::where('user_id', $userId)->sum('last_year_amount'),
            PntCashFlowModel::where('user_id', $userId)->sum('this_year_amount'),
            PntCashFlowModel::where('user_id', $userId)->sum('current_amount'),
        ];

        return response()->json([
            'status'    => true,
            'labels'    => ['Last Year', 'This Year', 'Current Year'],
            'assets'    => $assets,
            'liability' => $liability,
            'cashflow'  => $cashflow,
        ]);
    }


}