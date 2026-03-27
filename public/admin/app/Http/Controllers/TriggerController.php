<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PriceModuleCategory;
use App\Models\PriceModule;

use App\Models\Trigger; 

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class TriggerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:trigger-notification-list|trigger-notification-create|trigger-notification-edit', ['only' => ['index']]);
        $this->middleware('permission:trigger-notification-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:trigger-notification-edit', ['only' => ['edit','update']]); 
         
    }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $trigger = Trigger::where('userid',Auth()->user()->id)->get();
       
        return view('triggernotification.index', ['trigger' => $trigger, 'admin' => 0]);
    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    { 
       
        return view('triggernotification.add-triggernotification', [ 'admin' => 0]);
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
    public function store(Request $request)
    {
        // Validations
        $request->validate([
            'type'    => 'required',
            'trigger_if'     => 'required', 
            'trigger_roe'     => 'required', 
            'trigger_is'     => 'required', 
            'trigger_greater_than'     => 'required', 
            'target'     => 'required', 
            'link'    => 'required',
            'description'    => 'required',
            'status'     => 'required', 
        ]);

        DB::beginTransaction();
        try {
             
            // Store Data
            $trigger = new Trigger;
            $trigger->type = $request->type;
            $trigger->isread = 0;
            $trigger->userid = Auth()->user()->id;
            $trigger->trigger_if = $request->trigger_if;
            $trigger->trigger_roe = $request->trigger_roe;
            $trigger->trigger_is = $request->trigger_is;
            $trigger->trigger_greater_than = $request->trigger_greater_than;
            $trigger->target = $request->target;
            $trigger->link = $request->link;
            $trigger->description = $request->description;
            $trigger->created_at = now();
            $trigger->updated_at = now();
            $trigger->status = $request->status;
            $trigger->save(); 

           
            DB::commit();
            return redirect()->route('triggernotification.triggernotificationlist')->with('success','Trigger Added Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function updateStatus($pricing_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'pricing_id'   => $pricing_id,
            'status'    => $status
        ], [
            'pricing_id'   =>  'required|exists:price_modules,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('triggernotification.triggernotificationlist')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            PriceModule::whereId($pricing_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('triggernotification.triggernotificationlist')->with('success','Trigger Status Updated Successfully!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function edit(Trigger $trigger)
    {
       
        return view('triggernotification.edit-triggernotification')->with([
            'trigger'  => $trigger,
            'admin' => 0
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, Trigger $trigger)
    {
        // Validations
        $request->validate([
            'type'    => 'required',
            'trigger_if'     => 'required', 
            'trigger_roe'     => 'required', 
            'trigger_is'     => 'required', 
            'trigger_greater_than'     => 'required', 
            'target'     => 'required', 
            'link'    => 'required',
            'description'    => 'required',
            'status'     => 'required', 
        ]);

        DB::beginTransaction();
        try {
             
            // Store Data
            $trigger = Trigger::find($trigger->id);
            $trigger->type = $request->type; 
            $trigger->trigger_if = $request->trigger_if;
            $trigger->trigger_roe = $request->trigger_roe;
            $trigger->trigger_is = $request->trigger_is;
            $trigger->trigger_greater_than = $request->trigger_greater_than;
            $trigger->target = $request->target; 
            $trigger->link = $request->link;
            $trigger->description = $request->description;
            $trigger->updated_at = now();
            $trigger->status = $request->status;
            $trigger->save(); 


            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('triggernotification.triggernotificationlist')->with('success','Trigger Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    public function delete(Trigger $trigger)
    {
        DB::beginTransaction();
        try {
            // Delete User
            Trigger::whereId($trigger->id)->delete();

            DB::commit();
            return redirect()->route('triggernotification.triggernotificationlist')->with('success', 'Trigger Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Import Users 
     * @param Null
     * @return View File
     */
    public function importUsers()
    {
        return view('users.import');
    }

    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
        
        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'agents.xlsx');
    }

       /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function editCategoryPrices(Request $request)
    {
        $pricing = PriceModuleCategory::get();
        return view('pricing.edit-price-category')->with([ 
            'pricing'  => $pricing,
            'admin' => 1
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function updateCategoryPrices(Request $request)
    {
       /* // Validations
        $request->validate([
            'amount'    => 'required', 
        ]);
*/
        DB::beginTransaction();
        try {

            foreach($request->amount as $key=>$amountlist){
                   // Store Data
            $user_updated = PriceModuleCategory::whereId($key)->update([
                 'amount'    => $amountlist,
                
            ]); 
            }
         

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('pricing.editCategoryPrices')->with('success','Category Price Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }


}
