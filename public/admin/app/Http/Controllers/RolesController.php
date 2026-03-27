<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Auth;

class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $id = Auth()->user()->id;
        $roles = Role::where('added_by',$id)->get();

        return view('roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('roles.add', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required'
            ]);
             $name = $request->name;
             $id = Auth()->user()->id;
            $check_role = Role::where('name','LIKE','%'.$name.'%')->where('added_by',$id)->first();
            if($check_role){
                 return redirect()->route('roles.create')->with('error','Name Already Taken, Please use different name');
            }
            
            $roles = new Role;
            $roles->name = $name;
            $roles->guard_name = 'web';
            $roles->created_at = now();
            $roles->updated_at = now();
            $roles->added_by = $id;
            $roles->save(); 

            DB::commit();
            return redirect()->route('roles.index')->with('success','Roles created successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('roles.create')->with('error',$th->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::whereId($id)->with('permissions')->first();
        $roleid = Auth()->user()->role_id;
        $permissions = Permission::where('role_id','LIKE','%'.$roleid.'%')->get();
        
        return view('roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            // Validate Request
            $request->validate([
                'name' => 'required'
            ]);
            
            $role = Role::whereId($id)->first();

            $role->name = $request->name;
            $role->guard_name = 'web';
            $role->save();

            // Sync Permissions
            $permissions = $request->permissions;
            $role->syncPermissions($permissions);
            
            DB::commit();
            return redirect()->route('roles.index')->with('success','Roles updated successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('roles.edit',['role' => $role])->with('error',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
           $users = User::where('added_by', auth()->id())->where('role_id', $id)->exists();
            if ($users) {
                return redirect()->route('roles.index')
                    ->with('error', 'This role is already assigned to an admin. Please delete the assigned admin(s) before deleting this role.');
            }
            Role::whereId($id)->delete();
            DB::commit();
            return redirect()->route('roles.index')->with('success','Roles deleted successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('roles.index')->with('error',$th->getMessage());
        }
    }
}
