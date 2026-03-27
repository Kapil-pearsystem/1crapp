<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\Customer;
use App\Models\AgentReferrralSetting;
use App\Models\Order;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\ProductInspection;
// use App\Helper\Helper as Helper;

class ProductServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:product-list|notification-create', ['only' => ['productsslist']]);
    //     $this->middleware('permission:product-create', ['only' => ['addproductservss','store', 'updateStatus']]);
    //    $this->middleware('permission:product-edit', ['only' => ['editproductservss','update']]);
        
    //     $this->middleware('permission:product-service-category-list|product-service-category-create|product-service-category-edit', ['only' => ['categorylist']]);
    //     $this->middleware('permission:product-service-category-create', ['only' => ['addcategory','storecategory']]);
    //     $this->middleware('permission:product-service-category-edit', ['only' => ['editcategory','updatecategory']]);
    
    // }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $product = ProductService::join('product_services_category','product_services_category.id','product_services.prod_category')->select('product_services.*','product_services_category.name')->where('product_services.agent_id',Auth()->user()->id)->get();
        return view('productservices.index', ['product' => $product, 'admin' => 0]);
    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    {
        $roles = Role::wherein('id',[2])->get();
        
         $productcategory = ProductServiceCategory::where('status',1)->where('agent_id',Auth()->user()->id)->get();
       
        return view('productservices.add-product-services', ['roles' => $roles, 'admin' => 0,'productcategory'=>$productcategory]);
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
            'prod_name'    => 'required',
            'prod_price'     => 'required',
            'prod_rate'         => 'required',
            'prod_category' => 'required', 
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'expiry_date' => 'nullable|date|after_or_equal:today',
        ]);

        DB::beginTransaction();
        try {
            
            // Store Data
            $product = new ProductService;
            $product->agent_id = Auth()->user()->id;
            $product->prod_name = $request->prod_name;
            $product->prod_category = $request->prod_category;
            $product->prod_price = $request->prod_price;
            $product->prod_rate = $request->prod_rate;
            $product->discount_percent = $request->discount_percent;
            $product->expiry_date = $request->expiry_date;
            $product->status = $request->status; 
            $product->created_at = now();
            $product->updated_at = now();
            $product->save();
            
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('productservices.productsslist')->with('success','Product Created Successfully.');

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
    public function updateStatus($user_id, $status, $reason=null)
    {
        // Validation
        $validate = Validator::make([
            'user_id'   => $user_id,
            'status'    => $status
        ], [
            'user_id'   =>  'required|exists:agents,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('users.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status with reason
            if($reason){
                User::whereId($user_id)->update(['status' => $status, 'reason' => $reason]);
            }
            else {
                User::whereId($user_id)->update(['status' => $status, 'reason' => '']);
            }

            // Update Status
            User::whereId($user_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('productservices.productsslist')->with('success','Agent Updated Successfully.');
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
    public function edit(ProductService $product)
    {
        $roles = Role::wherein('id',[2])->get();
         $productcategory = ProductServiceCategory::where('status',1)->where('agent_id',Auth()->user()->id)->get();
        return view('productservices.edit-product-services')->with([
            'roles' => $roles,
            'product'  => $product,
            'productcategory' => $productcategory,
            'admin' => 0
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, ProductService $product)
    {
        // Validations
        // Validations
        $request->validate([
            'prod_name'    => 'required',
            'prod_price'     => 'required',
            'prod_rate'         => 'required',
            'prod_category' => 'required', 
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'expiry_date' => 'nullable|date|after_or_equal:today',
        ]);

        DB::beginTransaction();
        try {
            
            // Store Data
            $product = ProductService::find($product->id);
            $product->agent_id = Auth()->user()->id;
            $product->prod_name = $request->prod_name;
            $product->prod_category = $request->prod_category;
            $product->prod_price = $request->prod_price;
            $product->prod_rate = $request->prod_rate;
            $product->discount_percent = $request->discount_percent;
            $product->expiry_date = $request->expiry_date;
            $product->status = $request->status;  
            $product->updated_at = now();
            $product->save();
            

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('productservices.productsslist')->with('success','Product Updated Successfully.');

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
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            // Delete User
            ProductService::whereId($id)->delete();

            DB::commit();
            return redirect()->route('productservices.productsslist')->with('success', 'Product Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    
 
     /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function categorylist()
    {
        $product = ProductServiceCategory::where('agent_id',Auth()->user()->id)->get();
        return view('productservices.category-index', ['product' => $product, 'admin' => 0]);
    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function addcategory()
    {
        $roles = Role::wherein('id',[2])->get();
       
        return view('productservices.add-product-services-category', ['roles' => $roles, 'admin' => 0]);
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
    public function storecategory(Request $request)
    {
        // Validations
        $request->validate([
            'name'    => 'required',
            'status'     => 'required',
        ]);

        DB::beginTransaction();
        try {
            
            // Store Data
            $product = new ProductServiceCategory;
            $product->agent_id = Auth()->user()->id;
            $product->name = $request->name; 
            $product->status = $request->status; 
            $product->created_at = now();
            $product->updated_at = now();
            $product->save();
            
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('productservices.categorylist')->with('success','Product Category Created Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
 

    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function editcategory(ProductServiceCategory $product)
    {
        $roles = Role::wherein('id',[2])->get();
        return view('productservices.edit-product-services-category')->with([
            'roles' => $roles,
            'product'  => $product,
            'admin' => 0
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function updatecategory(Request $request, ProductServiceCategory $product)
    {
        // Validations
        // Validations
        $request->validate([
            'name'    => 'required',
            'status'     => 'required',
        ]);

        DB::beginTransaction();
        try {
            
            // Store Data
            $product = ProductServiceCategory::find($product->id);
            $product->agent_id = Auth()->user()->id;
            $product->name = $request->name;
            $product->status = $request->status;  
            $product->updated_at = now();
            $product->save();
            

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('productservices.categorylist')->with('success','Product Category Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
    public function deletecategory($id)
    {

        DB::beginTransaction();
        try {
            $product = ProductServiceCategory::find($id);
            if (ProductService::where('prod_category', $product->id)->exists()) {
                return redirect()->route('productservices.categorylist')
                    ->with('error', 'This category already has a product assigned to it, so it cannot be deleted.');
            }
            // dd($product->id);
            // Store Data
            $product = ProductServiceCategory::find($product->id);
            $product->delete();
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('productservices.categorylist')->with('success','Product Category Deleted Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
 
    public function inspectionList($product_id)
{
    $inspections = ProductInspection::where('product_id', $product_id)
        ->orderBy('id', 'desc')
        ->get();

    return view('productservices.product-inspection', compact('inspections', 'product_id'));
}
public function inspectionForm($product_id, $id = null)
{
    $inspection = null;

    if ($id) {
        $inspection = ProductInspection::findOrFail($id);
    }

    return view('productservices.add-product-inspection', compact('product_id', 'inspection'));
}
public function inspectionStore(Request $request)
{
    $request->validate([
        'product_id' => 'required|integer',
        'bullet1' => 'nullable|string',
        'bullet2' => 'nullable|string',
        'bullet3' => 'nullable|string',
        'bullet4' => 'nullable|string',
        'bullet5' => 'nullable|string',
        'bullet6' => 'nullable|string',
        'youtube_embed_link' => 'nullable|string',
        'title' => 'nullable|string',
        'title_link' => 'nullable|string',
        'status' => 'required|in:0,1',
    ]);

    DB::beginTransaction();
    try {

        // UPDATE
        if ($request->filled('id')) {
            $inspection = ProductInspection::findOrFail($request->id);
        }
        // CREATE
        else {
            $inspection = new ProductInspection();
            $inspection->created_by = auth()->user()->id;
        }

        $inspection->product_id = $request->product_id;
        $inspection->bullet1 = $request->bullet1;
        $inspection->bullet2 = $request->bullet2;
        $inspection->bullet3 = $request->bullet3;
        $inspection->bullet4 = $request->bullet4;
        $inspection->bullet5 = $request->bullet5;
        $inspection->bullet6 = $request->bullet6;
        $inspection->youtube_embed_link = $request->youtube_embed_link;
        $inspection->title = $request->title;
        $inspection->title_link = $request->title_link;
        $inspection->status = $request->status;
        $inspection->save();

        DB::commit();

        return redirect()
            ->route('productservices.inspection.list', $inspection->product_id)
            ->with('success', 'Product Inspection saved successfully');

    } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->back()->with('error', $th->getMessage());
    }
}
public function inspectionDelete($product_id, $id)
{
    DB::beginTransaction();
    try {
        ProductInspection::whereId($id)->delete();
        DB::commit();

        return redirect()->route('productservices.inspection.list', $product_id)
                         ->with('success', 'Inspection deleted successfully');

    } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->back()->with('error', $th->getMessage());
    }
}



   

}
