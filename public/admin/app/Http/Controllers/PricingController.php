<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PriceModuleCategory;
use App\Models\PriceModule;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PricingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       /* $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['delete']]);*/
    }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $PriceModuleCategory = PriceModuleCategory::get();
        $PriceModule = PriceModule::join('price_module_category','price_module_category.id','price_modules.price_cat_id')->select('price_modules.*','price_module_category.title')->paginate(10);
        return view('pricing.index', ['PriceModuleCategory' => $PriceModuleCategory,'PriceModule'=>$PriceModule, 'admin' => 1]);
    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    {
        $PriceModuleCategory = PriceModuleCategory::get();
       
        return view('pricing.add', ['PriceModuleCategory' => $PriceModuleCategory, 'admin' => 1]);
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
            'name'    => 'required',
            'price_cat_id'     => 'required',
            'status'       =>  'required|numeric|in:0,1',
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $user = PriceModule::create([
                'name'    => $request->name,
                'price_cat_id'     => $request->price_cat_id,
                'status'         => $request->status,
            ]);

           
            DB::commit();
            return redirect()->route('pricing.index')->with('success','Pricing Created Successfully.');

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
            return redirect()->route('pricing.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            PriceModule::whereId($pricing_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('pricing.index')->with('success','Pricing Status Updated Successfully!');
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
    public function edit(PriceModule $pricing)
    {
        $PriceModuleCategory = PriceModuleCategory::get();
        return view('pricing.edit')->with([
            'PriceModuleCategory' => $PriceModuleCategory,
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
    public function update(Request $request, PriceModule $pricing)
    {
        // Validations
        $request->validate([
            'name'    => 'required',
            'price_cat_id'     => 'required', 
            'status'       =>  'required|numeric|in:0,1',
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $user_updated = PriceModule::whereId($pricing->id)->update([
                 'name'    => $request->name,
                'price_cat_id'     => $request->price_cat_id,
                'status'         => $request->status,
            ]); 

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('pricing.index')->with('success','Pricing Updated Successfully.');

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
    public function delete(PriceModule $pricing)
    {
        DB::beginTransaction();
        try {
            // Delete User
            PriceModule::whereId($pricing->id)->delete();

            DB::commit();
            return redirect()->route('pricing.index')->with('success', 'Pricing Deleted Successfully!.');

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
