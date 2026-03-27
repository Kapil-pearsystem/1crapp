<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\Customer;
use App\Models\AgentReferrralSetting;
use App\Models\Order;
use App\Models\ProductService;
use App\Models\Resource;
use App\Models\ResourceBullet;
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

class ResourceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:resource-list|resource-create|resource-edit', ['only' => ['index']]);
        $this->middleware('permission:resource-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:resource-edit', ['only' => ['edit','update']]);
    }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $resource = Resource::where('user_id',Auth()->user()->id)->get();
        return view('resourses.index', ['resource' => $resource, 'admin' => 0]);
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
       
        return view('resourses.add-resourses', ['roles' => $roles, 'admin' => 0]);
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
            'title'    => 'required',
            'subtitle'     => 'required',
            'video_url'         => 'required',
            'cta_text' => 'required',
            'postformotion' => 'required',
            'postformvalue' => 'required',
            'status' => 'required', 
        ]);

        DB::beginTransaction();
        try {
           
            // Store Data
            $resource = new Resource; 
            $resource->user_id = Auth()->user()->id;
            $resource->title = $request->title;
            $resource->subtitle = $request->subtitle;
            $resource->video_url = $request->video_url;
            $resource->cta_text = $request->cta_text;
            $resource->openinnewtab = $request->openinnewtab;
            $resource->postformotion = $request->postformotion;
            $resource->postformvalue = $request->postformvalue;
            $resource->status = $request->status;  
            $resource->created_at = now();
            $resource->updated_at = now();
            $resource->save();
           
            if(!empty(request('bullets'))){
                foreach($request->bullets as $val){
                    $resourcebullets = new ResourceBullet; 
                    $resourcebullets->user_id = Auth()->user()->id;
                    $resourcebullets->title = $val;
                    $resourcebullets->resource_id = $resource->id;
                    $resourcebullets->created_at = now();
                    $resourcebullets->updated_at = now();
                    $resourcebullets->save();
                }
            }
            

            
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('resources.resourceslist')->with('success','Success ! Resource Created Successfully.');

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
    public function edit(Resource $resource)
    {
        $roles = Role::wherein('id',[2])->get();
        $resourceBullet =  ResourceBullet::where('resource_id',$resource->id)->get();
        return view('resourses.edit-resourses')->with([
            'roles' => $roles,
            'resource'  => $resource,
            'resourceBullet'  => $resourceBullet,
            'admin' => 0
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, Resource $resource)
    {
        // Validations
        // Validations
        $request->validate([
            'title'    => 'required',
            'subtitle'     => 'required',
            'video_url'         => 'required',
            'cta_text' => 'required',
            'postformotion' => 'required',
            'postformvalue' => 'required',
            'status' => 'required', 
        ]);

        DB::beginTransaction();
        try {
           
            // Store Data
            $resource = Resource::find($resource->id); 
            $resource->title = $request->title;
            $resource->subtitle = $request->subtitle;
            $resource->video_url = $request->video_url;
            $resource->cta_text = $request->cta_text;
            $resource->openinnewtab = $request->openinnewtab;
            $resource->postformotion = $request->postformotion;
            $resource->postformvalue = $request->postformvalue;
            $resource->status = $request->status;  
            $resource->updated_at = now();
            $resource->save();
             
            if(!empty(request('bullets'))){
                  ResourceBullet::where('resource_id',$resource->id)->delete(); 
                foreach($request->bullets as $val){
                    $resourcebullets = new ResourceBullet; 
                    $resourcebullets->user_id = Auth()->user()->id;
                    $resourcebullets->title = $val;
                    $resourcebullets->resource_id = $resource->id;
                    $resourcebullets->created_at = now();
                    $resourcebullets->updated_at = now();
                    $resourcebullets->save();
                }
            }
            
            
            

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('resources.resourceslist')->with('success','Resource Updated Successfully.');

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
    public function delete(Resource $resource)
    {
        DB::beginTransaction();
        try {
            // Delete User
            Resource::whereId($resource->id)->delete();

            DB::commit();
            return redirect()->route('resources.resourceslist')->with('success', 'Resource Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

   

}