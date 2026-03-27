<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password; 
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance. 
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index']]);
        $this->middleware('permission:admin-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
       // $this->middleware('permission:user-delete', ['only' => ['delete']]); 
    }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        if(Auth()->user()->hasrole('Agent')){
            $users = User::with('roles')->where('added_by',Auth()->user()->id)->where('role_id','!=',2)->get();
        }else{
            $users = User::with('roles')->where('role_id','!=',2)->where('added_by',Auth()->user()->id)->get();
       
        }
       
        
        return view('users.index', ['users' => $users, 'admin' => 1]);
    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    {
        if(Auth()->user()->hasrole('Agent')){
            $roles = Role::where('added_by',Auth()->user()->id)->get();
        }else{
            $roles = Role::where('added_by',Auth()->user()->id)->get();
        }
        
       
        return view('users.add', ['roles' => $roles, 'admin' => 1]);
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
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|unique:agents,email',
            'mobile_number' => 'required|numeric|digits:10',
            'role_id'       =>  'required|exists:roles,id',
            'password'       =>  'required',
            'status'       =>  'required|numeric|in:0,1',
        ],['role_id.required'       =>  'The role field is required']);

        DB::beginTransaction();
        try {

            // Store Data
            $user = User::create([
                'company_id'    => '100000',
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'mobile_number' => $request->mobile_number,
                'role_id'       => $request->role_id,
                'status'        => $request->status,
                'password'      => Hash::make($request->password),
                'added_by'      => Auth()->user()->id
            ]);

            // Delete Any Existing Role
            DB::table('model_has_roles')->where('model_id',$user->id)->delete();
            
            // Assign Role To User
            $user->assignRole($user->role_id);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('admin.index')->with('success','Admin Added Successfully.');

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
    public function updateStatus($user_id, $status)
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
            return redirect()->route('admin.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            User::whereId($user_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('admin.index')->with('success','Admin Status Updated Successfully!');
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
    public function edit(User $user)
    {
        if(Auth()->user()->hasrole('Agent')){
            $roles = Role::where('added_by',Auth()->user()->id)->get();
        }else{
            $roles = Role::where('added_by',Auth()->user()->id)->get();
        }
        
        
        return view('users.edit')->with([
            'roles' => $roles,
            'user'  => $user,
            'admin' => 1
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, User $user)
    {
        // Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|unique:agents,email,'.$user->id.',id',
            'mobile_number' => 'required|numeric|digits:10',
            'role_id'       =>  'required|exists:roles,id',
            'status'       =>  'required|numeric|in:0,1',
        ],['role_id.required'       =>  'The role field is required']);

        DB::beginTransaction();
        try {

            // Store Data
            $user_updated = User::whereId($user->id)->update([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'mobile_number' => $request->mobile_number,
                'role_id'       => $request->role_id,
                'status'        => $request->status,
            ]);

            // Delete Any Existing Role
            DB::table('model_has_roles')->where('model_id',$user->id)->delete();
            
            // Assign Role To User
            $user->assignRole($user->role_id);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('admin.index')->with('success','Admin Updated Successfully.');

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

    public function delete(User $user)
    {
        DB::beginTransaction();
        try {
    
            // Check if valid_upto exists and is in future
            if (!is_null($user->valid_upto) && Carbon::parse($user->valid_upto)->isFuture()) {
                return redirect()->back()->with('error', 'Record cannot be deleted because the account is still active.');
            }
            if ($user->valid_upto && Carbon::parse($user->valid_upto)->isPast() && $user->role_id != 1) {
                $usersExist = DB::table('users')->where('agent_id', $user->id)->exists();
                if ($usersExist) {
                    DB::table('users')->where('agent_id', $user->id)->update(['agent_id' => 8]);
                }
            }
            // Delete user if valid_upto is null or past
            $user->delete();
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Record Deleted Successfully!');
    
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

}
