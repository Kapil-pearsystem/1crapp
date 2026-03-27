<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\Customer;
use App\Models\AgentReferrralSetting;
use App\Models\Order;
use App\Models\ProductService;
use App\Models\Resource;
use App\Models\PropertyCategoryModel;
use App\Models\PropertyMarket;
use App\Models\PropertyMarketDetailsModel;
use App\Models\PropertyMarketDoc;
use App\Models\PropertyMarketPriceModel;
use App\Models\MarketplacePopupModel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
// use App\Helper\Helper as Helper;

class PropertymarketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:property-market-list|property-market-create|property-market-edit', ['only' => ['index']]);
        $this->middleware('permission:property-market-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:property-market-edit', ['only' => ['edit','update']]);
        //$this->middleware('permission:user-delete', ['only' => ['delete']]);
    }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index(Request $request)
    {
        $propertymarket = PropertyMarket::where('agent_id',Auth()->user()->id);
        if($request->user){
            $propertymarket = $propertymarket->where('user_id',$request->user);
        }
        $propertymarket = $propertymarket->orderBy('id', 'DESC')->get();
        
        $users = PropertyMarket::select('users.id', 'users.name')
        ->join('users', 'users.id','=','propertymarkets.user_id')
        ->where('propertymarkets.agent_id',Auth()->user()->id)
        ->distinct()
        ->get();
        // dd($users);
        return view('propertymarket.index', ['propertymarket' => $propertymarket, 'users'=>$users, 'admin' => 0]);
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
        $category = PropertyCategoryModel::where('status', 1)->orderBy('id','DESC')->get();
        return view('propertymarket.add-propertymarket', ['roles' => $roles, 'admin' => 0,'category'=>$category]);
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
     public function generatePropertyID(){
        $prop_id = 'FY-'.rand(1000,9999).date('Ymd');
        $property = PropertyMarket::where('property_id',$prop_id)->exists();
        if($property){
            $this->generatePropertyID();
        }else{
            return $prop_id;
        }
    }
    public function store(Request $request)
    {
        // Validations
         $request->validate([
            'property_category' => 'required',
            'property_type' => 'required',
            'property'    => 'required',
            'project_name' => 'required',
            'country'     => 'required',
            'state'     => 'required',
            'city'     => 'required',
            'owner_name'     => 'required',
            'owner_belong'   => 'required',
            'location' => 'required',
            'feedback' => 'required', 
            'price_from' => 'required', 
            'price_to' => 'required', 
            'current_status' => 'required', 
            'property_unit' => 'required', 
            'status' => 'required', 
        ]); 
        
        // dd($request->all());
        DB::beginTransaction();
        try {
           
            // Store Data
            if(isset($request->id)){
                $propertymarket = PropertyMarket::find($request->id); 
            }else{
                $propertymarket = new PropertyMarket(); 
            }
            $propertymarket->agent_id = Auth()->user()->id;
            $propertymarket->property_id = $this->generatePropertyID();
            $propertymarket->property_category = $request->property_category;
            $propertymarket->property_type = $request->property_type;
            $propertymarket->property = $request->property;
            $propertymarket->project_name = $request->project_name;
            $propertymarket->owner_name = $request->owner_name;
            $propertymarket->owner_belong = $request->owner_belong;
            $propertymarket->location = $request->location;
            $propertymarket->feedback = $request->feedback;
            $propertymarket->price_from = $request->price_from;  
            $propertymarket->price_to = $request->price_to;  
            $propertymarket->current_status = $request->current_status;  
            $propertymarket->status = $request->status; 
            $propertymarket->posted_by = $request->posted_by; 
            $propertymarket->created_at = now();
            $propertymarket->updated_at = now();
            $propertymarket->save();
            
            // details
            if(isset($request->id)){
                $details = PropertyMarketDetailsModel::where('property_market_id', $request->id)->first();
            }else{
                $details = new PropertyMarketDetailsModel(); 
            }
            $details = new PropertyMarketDetailsModel();
            $details->property_market_id = $propertymarket->id;
            $details->prop_country = $request->country;
            $details->prop_state = $request->state;
            $details->prop_city = $request->city;
            $details->property_unit = $request->property_unit;
            $res = $details->save();
            
            // Step 3: Save Uploaded Documents Dynamically
                PropertyMarketDoc::where('propertymarket_id', $propertymarket->id)
                    ->where('type', 'images_image')
                    ->delete();
            if ($request->has('images')) {
                foreach ($request->images as $key=>$file) {
                    $path = $this->saveDocumentDirect($file, 'uploads/property_docs');
                    $prop_docs = new PropertyMarketDoc();
                    $prop_docs->propertymarket_id =  $propertymarket->id;
                    $prop_docs->type =  'images_image';
                    $prop_docs->path =  asset('').$path;
                    $prop_docs->uploaded_by =  auth()->id();
                    $prop_docs->save();
                   
                }
                
            }
            if(!empty($request->old_images)){
            foreach ($request->old_images as $old_file) {
                    if($old_file){
                        $prop_docs = new PropertyMarketDoc();
                        $prop_docs->propertymarket_id =  $propertymarket->id;
                        $prop_docs->type =  'images_image';
                        $prop_docs->path =  $old_file;
                        $prop_docs->uploaded_by =  auth()->id();
                        $prop_docs->save();
                    }
                }
            }
            // Step 3: Save video link
            PropertyMarketDoc::where('propertymarket_id', $propertymarket->id)
                    ->where('type', 'video_link')
                    ->delete();
            if ($request->has('video_links')) {
                foreach ($request->video_links as $link) {
                    if (!empty($link)) {
                        $prop_link = new PropertyMarketDoc();
                        $prop_link->propertymarket_id = $propertymarket->id;
                        $prop_link->type = 'video_link';
                        $prop_link->path = $link;
                        $prop_link->uploaded_by = auth()->id();
                        $prop_link->save();
                    }
                }
            }
            
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('propertymarket.propertymarketlist')->with('success','Success ! Property Market Created Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
    
    private function saveDocumentDirect($file, string $folder = 'uploads/property_docs'): string
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $destination = public_path($folder);
    
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }
    
        $file->move($destination, $filename);
    
        return "$folder/$filename";
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
            return redirect()->route('resources.resourceslist')->with('success','Success ! Agent Updated Successfully.');
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
    public function edit(PropertyMarket $propertymarket)
    {
        // $roles = Role::wherein('id',[2])->get();
        // return view('propertymarket.edit-propertymarket')->with([
        //     'roles' => $roles,
        //     'propertymarket'  => $propertymarket,
        //     'admin' => 0
        // ]);
        $roles = Role::wherein('id',[2])->get();
        $category = PropertyCategoryModel::where('status', 1)->orderBy('id','DESC')->get();
        $details = PropertyMarketDetailsModel::where('property_market_id', $propertymarket->id)->first();
        $prop_images = PropertyMarketDoc::where('propertymarket_id', $propertymarket->id)->get();
        // dd($prop_images);
        return view('propertymarket.add-propertymarket', ['roles' => $roles, 'admin' => 0,'category'=>$category, 'property'  => $propertymarket, 'details'=>$details,'prop_images'=>$prop_images]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, PropertyMarket $propertymarket)
    {
        // Validations
        // Validations
          $request->validate([
            'property'    => 'required',
            'owner_name'     => 'required',
            'owner_belong'         => 'required',
            'property_type' => 'required',
            'project_name' => 'required',
            'location' => 'required',
            'feedback' => 'required', 
            'current_status' => 'required', 
            'status' => 'required', 
        ]); 
        DB::beginTransaction();
        try {
           
            // Store Data
             $propertymarket = PropertyMarket::find($propertymarket->id);  
            $propertymarket->property = $request->property;
            $propertymarket->owner_name = $request->owner_name;
            $propertymarket->owner_belong = $request->owner_belong;
            $propertymarket->property_type = $request->property_type;
            $propertymarket->project_name = $request->project_name;
            $propertymarket->location = $request->location;
            $propertymarket->feedback = $request->feedback;
            $propertymarket->current_status = $request->current_status;  
            $propertymarket->status = $request->status;  
            $propertymarket->posted_by = $request->posted_by;  
            $propertymarket->updated_at = now();
            $propertymarket->save();
            

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('propertymarket.propertymarketlist')->with('success','Property Market Updated Successfully.');

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
    // public function delete(PropertyMarket $propertymarket)
    // {
    //     DB::beginTransaction();
    //     try {
    //         // Delete User
    //         PropertyMarket::whereId($propertymarket->id)->delete();

    //         DB::commit();
    //         return redirect()->route('propertymarket.propertymarketlist')->with('success', 'Property Market Deleted Successfully.');

    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', $th->getMessage());
    //     }
    // }
    public function delete($id)
    {
        // DB::beginTransaction();
        // try {
        // Step 1: Find the main property
            $property = PropertyMarket::findOrFail($id);
            // dd($property);
            // Step 2: Delete related details
            PropertyMarketDetailsModel::where('property_market_id', $property->id)->delete();
            PropertyMarketDoc::where('propertymarket_id', $property->id)->delete();
            PropertyMarketPriceModel::where('property_market_id', $property->id)->delete(); // Optional
        
            // Step 3: Delete the main property
            $property->delete();
            // Step 4: Redirect with message
            return redirect()->back()->with('success', 'Marketplace property deleted successfully.');
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     return redirect()->back()->with('error', $th->getMessage());
        // }
    }
    
      /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function updateMarketStatus($id, $status)
    {
        // Validation
        $validate = Validator::make([
            'user_id'   => $id,
            'status'    => $status
        ], [
            'user_id'   =>  'required|exists:propertymarkets,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return 0;
        }

        try {
            DB::beginTransaction();

            // Update Status with reason
            PropertyMarket::whereId($id)->update(['market_status' => $status]);
            
            // Commit And Redirect on index with Success Message
            DB::commit();
            return 1;
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function popup_details($property_id){
        $details = MarketplacePopupModel::where('property_id', $property_id)->first();
        return view('propertymarket.popup-details', compact('property_id', 'details'));
    }
    public function popup_store(Request $request)
    {
        MarketplacePopupModel::updateOrCreate(
            [
                'property_id' => $request->property_id, // condition
            ],
            [
                'title'       => $request->title,
                'cta_title'   => $request->cta_title,
                'vid_link'    => $request->vid_link,
                'bullet1'     => $request->bullet1,
                'bullet2'     => $request->bullet2,
                'bullet3'     => $request->bullet3,
                'bullet4'     => $request->bullet4,
                'bullet5'     => $request->bullet5,
                'bullet6'     => $request->bullet6,
                'form_source' => $request->form_source,
                'created_by'  => auth()->user()->id,
            ]
        );

        return redirect()->back()->with('success', 'Popup details saved successfully.');
    }
    public function cms(){
        $details = DB::table('tbl_property_marketplace_cms')->where('created_by', auth()->user()->id)->first();
        return view('propertymarket.cms', compact('details'));
    }

    public function cms_store(Request $request)
    {
        // Get existing record (for update)
        $details = null;
        if ($request->id) {
            $details = DB::table('tbl_property_marketplace_cms')
                ->where('id', $request->id)
                ->first();
        }

        /* =====================
        Upload Verification Logo
        ====================== */
        $varification_logo = $details->varification_logo ?? null;
        if ($request->hasFile('varification_logo')) {
            $file = $request->file('varification_logo');
            $name = time().'_ver_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/'), $name);
            $varification_logo = asset('uploads/' . $name);
        }

        
        $satisfaction_logo = $details->satisfaction_logo ?? null;
        if ($request->hasFile('satisfaction_logo')) {
            $file = $request->file('satisfaction_logo');
            $name = time().'_sat_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/'), $name);
            $satisfaction_logo = asset('uploads/' . $name);
        }

    
        $imagePaths = $details->images ?? null;
        if ($request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $file) {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/'), $name);
                $paths[] = asset('uploads/' . $name);
            }
            $imagePaths = json_encode($paths);
        }
        // dd($imagePaths);

        DB::table('tbl_property_marketplace_cms')->updateOrInsert(
            [
                'id' => $request->id, // update by ID
            ],
            [
                'title'              => $request->title,
                'heading'            => $request->heading,
                'sub_title'          => $request->sub_title,
                'varification_logo'  => $varification_logo,
                'satisfaction_logo'  => $satisfaction_logo,
                'images'             => $imagePaths,
                'created_by'         => auth()->user()->id,
                'updated_at'         => now(),
                'created_at'         => $request->id ? $details->created_at : now(),
            ]
        );

        return redirect()->back()->with('success', 'CMS details saved successfully.');
    }
     public function enquiry_list(){
        $lists = DB::table('tbl_property_enquiry')->select('tbl_property_enquiry.*','propertymarkets.property as property')
        ->join('propertymarkets', 'propertymarkets.id','=','tbl_property_enquiry.property_id')
        ->where('tbl_property_enquiry.agent_id', auth()->user()->id)->get();
        return view('propertymarket.enquiries', compact('lists'));
    }


   

}