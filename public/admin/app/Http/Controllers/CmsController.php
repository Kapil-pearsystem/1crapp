<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Exports\CustomerExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:cms-list|cms-create|cms-edit|cms-delete', ['only' => ['index']]);
        $this->middleware('permission:cms-create', ['only' => ['create','store']]);
        $this->middleware('permission:cms-edit', ['only' => ['edit','update', 'updateStatus']]);
      //  $this->middleware('permission:customer-delete', ['only' => ['delete']]); 
    }


    /**
     * List Customer 
     * @param Nill
     * @return Array $user

     */
    public function index(Request $request)
    {
         
      $cms = Cms::where('created_by', Auth()->user()->id)->orderBy('id', 'DESC')->get();
      
        
        
        return view('cms.index', ['cms' => $cms]);
    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user

     */
    public function create()
    {
       
        return view('cms.add-cms');
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users

     */
    public function store(Request $request)
    {
        // Validations
        $request->validate([
            'name'    => 'required',
             
        ]);
        $user_id = Auth()->user()->id;
        DB::beginTransaction();
        try {
           
              $image = '';
                   
            if(!empty($request->image))
            {
                $profile_imagefileName = time().rand().'.'.$request->image->extension();        
                $request->image->move(public_path('img'), $profile_imagefileName);
                $image =$profile_imagefileName;
            }
       
     
            // Store Data
            $user = Cms::create([
                'name'    => $request->name,
                'description'         => $request->description,
                // 'slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', $request->page_url),
                'slug' => $request->page_url,
                'image'       => $image,
                'status'        => $request->status,
                'created_at'      => now(),
                'updated_at'      => now(),
                'updated_by'      => $user_id,
                'created_by'      => $user_id
            ]);
         
       
 
            // Delete Any Existing Role
           // DB::table('model_has_roles')->where('model_id',$user->id)->delete();
           
            // Assign Role To User
           // $user->assignRole($user->role_id);
 
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('cms.index')->with('success','CMS Added Successfully.');
 
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

     */
    public function edit(Cms $cms)
    {
     
        return view('cms.edit-cms')->with([
            'cms'  => $cms
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users

     */
    public function update(Request $request, Cms $cms)
    {
        // Validations
        $request->validate([
            'name'    => 'required', 
        ]);

        DB::beginTransaction();
        try {

        $user_id = Auth()->user()->id;
           
           $image = $cms->image;
           
        if(!empty($request->image))
		{
	    	$profile_imagefileName = time().rand().'.'.$request->image->extension();		
            $request->image->move(public_path('img'), $profile_imagefileName);
			$image =$profile_imagefileName;
		}
		
		
            // Store Data
            $user_updated = Cms::whereId($cms->id)->update([ 
                'name'    => $request->name,
                'slug' => $request->page_url,
                'description'         => $request->description, 
                'image'       => $image,
                'status'        => $request->status,
                'updated_at'      => now(),
                'updated_by'      => $user_id
            ]);

            // Delete Any Existing Role
          //  DB::table('model_has_roles')->where('model_id',$user->id)->delete();
            
            // Assign Role To User
         //   $user->assignRole($user->role_id);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('cms.index')->with('success','CMS Updated Successfully.');

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

     */
    public function delete(Cms $cms)
    {
        DB::beginTransaction();
    
        try {
    
            // Check if CMS belongs to logged-in user
            if ($cms->created_by != Auth()->user()->id) {
                return redirect()->route('cms.index')
                    ->with('error', 'You are not authorized to delete this CMS.');
            }
    
            // Delete CMS
            $cms->delete();
    
            DB::commit();
    
            return redirect()->route('cms.index')
                ->with('success', 'CMS Deleted Successfully!');
    
        } catch (\Throwable $th) {
    
            DB::rollBack();
    
            return redirect()->back()
                ->with('error', $th->getMessage());
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
        return Excel::download(new CustomerExport, 'customers.xlsx');
    }

}