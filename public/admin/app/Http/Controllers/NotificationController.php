<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PriceModuleCategory;
use App\Models\PriceModule;

use App\Models\Notification;
use App\Models\NotificationsCategory;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    //     $this->middleware('permission:notification-list|notification-create', ['only' => ['index']]);
    //     $this->middleware('permission:notification-create', ['only' => ['create','store', 'updateStatus']]);
    //    // $this->middleware('permission:notification-edit', ['only' => ['edit','update']]);

    //     $this->middleware('permission:notification-category-list|notification-category-create|notification-category-edit', ['only' => ['categorylist']]);
    //     $this->middleware('permission:notification-category-create', ['only' => ['addcategory','storecategory']]);
    //     $this->middleware('permission:notification-category-edit', ['only' => ['editcategory','updatecategory']]);

    }


    /**
     * List User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $Notification = Notification::join('notifications_category','notifications_category.id','notifications.type')
        ->select('notifications.*','notifications_category.name as category_name')
        ->where('notifications.created_by',Auth()->user()->id)
        ->orderBy('notifications.id','DESC')->get();
        return view('notifications.index', [ 'Notification'=>$Notification, 'admin' => 1]);
    }

    /**
     * Create User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    {
        $notificationscategory = NotificationsCategory::where(['status'=>1, 'agent_id'=>Auth()->user()->id])->get();
        return view('notifications.add', ['admin' => 1,'notificationscategory'=>$notificationscategory]);
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
            'type'     => 'required',
            'description'     => 'required',
            'status'       =>  'required|numeric|in:0,1',
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $user = Notification::create([
                'title'    => $request->title,
                'type'     => $request->type,
                'description'     => $request->description,
                'status'         => $request->status,
                'created_by'         => Auth()->user()->id,
            ]);
            if(!Auth()->user()->hasrole('Agent')){
                // for users
                $userList = User::where('status',1)->get();
                foreach($userList as $list){
                    $to = $list->email;
                    $title = $list->title;
                    $description = $list->description;
                    //sendEmail($to,$title,$description);
                }
            }else{
                // for customers
            }

            DB::commit();
            return redirect()->route('notification.index')->with('success','Notification Added Successfully!');

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
    public function updateStatus($notification_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'notifications_id'   => $notification_id,
            'status'    => $status
        ], [
            'notifications_id'   =>  'required|exists:notifications,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('notification.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            Notification::whereId($notification_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('notification.index')->with('success','Notification Status Updated Successfully!');
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
        $notificationscategory = NotificationsCategory::get();
        return view('pricing.edit')->with([
            'PriceModuleCategory' => $PriceModuleCategory,
            'pricing'  => $pricing,
            '$notificationscategory'=> $notificationscategory,
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
            return redirect()->route('pricing.index')->with('success','Notification Updated Successfully!');

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
            Notification::whereId($id)->delete();

            DB::commit();
            return redirect()->route('notification.index')->with('success', 'Notifications Deleted Successfully!.');

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
     * List User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function categorylist()
    {
        $product = NotificationsCategory::where('agent_id', Auth()->user()->id)->get();
        return view('notifications.category-index', ['product' => $product, 'admin' => 0]);
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
        return view('notifications.add-notifications-category', ['roles' => $roles, 'admin' => 0]);
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
            'icon'    => 'required',
            'status'     => 'required',
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $product = new NotificationsCategory;
            $product->agent_id = Auth()->user()->id;
            $product->name = $request->name;
            $product->icon = $request->icon;
            $product->status = $request->status;
            $product->created_at = now();
            $product->updated_at = now();
            $product->save();

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('notification.categorylist')->with('success','Notification Category Added Successfully.');

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
    public function deletecategory($id)
    {
        DB::beginTransaction();
    
        try {
    
            $category = NotificationsCategory::where('id', $id)
                            ->where('agent_id', Auth()->user()->id)
                            ->first();
            
            if (Notification::where('type', $id)->exists()) {
                return redirect()->back()->with('error', 'This notification category is already in use and cannot be deleted.');
            }
            if (!$category) {
                return redirect()->back()->with('error', 'Notification category not found or unauthorized.');
            }
    
            $category->delete();
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Notification category deleted successfully.');
    
        } catch (\Throwable $th) {
    
            DB::rollBack();
    
            return redirect()->back()
                    ->with('error', $th->getMessage());
        }
    }

    public function editcategory(NotificationsCategory $product)
    {
        $roles = Role::wherein('id',[2])->get();
        return view('notifications.edit-notifications-category')->with([
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
    public function updatecategory(Request $request, NotificationsCategory $product)
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
            $product = NotificationsCategory::find($product->id);
            $product->agent_id = Auth()->user()->id;
            $product->name = $request->name;
            $product->icon = $request->icon;
            $product->status = $request->status;
            $product->updated_at = now();
            $product->save();


            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('notification.categorylist')->with('success','Notification Category Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }





}
