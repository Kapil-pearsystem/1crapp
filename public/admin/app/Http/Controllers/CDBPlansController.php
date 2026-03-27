<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CdbFeature;
use App\Models\CdbPlanModel;
use App\Models\CdbPlanFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Helper\Helper;
use Illuminate\Support\Facades\Http;


class CDBPlansController extends Controller
{
   
    public function index()
    {
        $lists = CdbPlanModel::all();
        return view('cdbplan.index',compact('lists'));
    }
    public function store(Request $request)
    {
        // Validations
        $request->validate([
            'title'           => 'required',
            'status'          => 'required|numeric|in:0,1',
        ]);
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Check if agent already has free plan
            $hasFreePlan = CdbPlanModel::where('agent_id', Auth()->user()->id)
                ->where(['monthly_price'=> 0, 'yearly_price'=>0])
                ->exists();
            
            // If no free plan exists AND current plan is not free
            if (!$hasFreePlan && $request->monthly_price > 0 && $request->yearly_price > 0) {
                return back()->with('error', 'A free (₹0) plan is required for plan list before adding paid plans.');
            }
            
            if($request->id){
                $plan = CdbPlanModel::find($request->id);  
                $msg = 'Plan Saved Successfully.';
            }else{
                $plan = new CdbPlanModel;
                 $msg = 'Plan Updated Successfully.';
            }
            $plan->agent_id        = Auth()->user()->id;
            $plan->title           = $request->title;
            $plan->monthly_price   = $request->monthly_price;
            // $plan->yearly_price    = $request->yearly_price;
            $plan->discount    = $request->discount;
            $plan->status          = $request->status;
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
            CdbPlanModel::whereId($id)->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Plan Deleted Successfully!.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    
    public function permissions($plan_id){
        $features = CdbFeature::get();
        $plan = CdbPlanModel::find($plan_id);
        $existingPermissions = CdbPlanFeature::where(['agent_id' => auth()->user()->id, 'plan_id'  => $plan_id])->pluck('permission')->toArray(); 
        // dd($plan_feature);
        return view('cdbplan.permissions',compact('features', 'plan', 'existingPermissions'));
    }
    
    
    public function updatePermissions(Request $request)
    {
        $plan_id = $request->plan_id;
        // dd($request->all());
        // Delete old permissions for this plan
        CdbPlanFeature::where('plan_id', $plan_id)->delete();
    
        // Insert new checked permissions
        if ($request->has('permissions')) {
    
            foreach ($request->permissions as $path => $value) {
    
                CdbPlanFeature::create([
                    'agent_id'   => Auth()->user()->id,
                    'plan_id'   => $plan_id,
                    'permission' => $path,
                ]);
            }
        }
    
        return back()->with('success', 'Permissions updated successfully.');
    }
    public function refreshPermission()
    {
        try {
    
            $response = Http::get('https://1crapp.com/cdb-features');
    
            if ($response->successful()) {
    
                $data = $response->json();
    
                return redirect()->back()->with(
                    'success',
                    $data['message'] ?? 'Routes refreshed successfully.'
                );
            }
    
            return redirect()->back()->with(
                'error',
                'API request failed.'
            );
    
        } catch (\Exception $e) {
    
            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

   


}