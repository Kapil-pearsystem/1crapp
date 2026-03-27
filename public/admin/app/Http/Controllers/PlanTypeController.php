<?php
namespace App\Http\Controllers;
use App\Models\PlanTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Helper\Helper;
use Illuminate\Support\Facades\Http;


class PlanTypeController extends Controller
{
   
    public function index()
    {
        $lists = PlanTypeModel::all();
        return view('plan-type.index',compact('lists'));
    }
    public function store(Request $request)
    {
        // Validations
        $request->validate([
            'title'           => 'required',
            'total_months'          => 'required|numeric',
            'total_days'          => 'required|numeric',
            'discount'          => 'required|numeric',
            'status'          => 'required|numeric|in:0,1',
        ]);
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Check if agent already has free plan
            
            if($request->id){
                $plan = PlanTypeModel::find($request->id);  
                $msg = 'Plan Type Updated Successfully.';
            }else{
                $plan = new PlanTypeModel;
                 $msg = 'Plan Type Added Successfully.';
            }
            $plan->title        = $request->title;
            $plan->total_months = $request->total_months;
            $plan->total_days   = $request->total_days;
            $plan->discount     = $request->discount;
            $plan->status       = $request->status;
            $plan->created_by   = Auth()->user()->id;
            $plan->save();
    
            DB::commit();
            return redirect()->back()->with('success', $msg);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }


    public function delete($id)
    {
        DB::beginTransaction();
        try {
            PlanTypeModel::whereId($id)->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Plan Type Deleted Successfully!.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}