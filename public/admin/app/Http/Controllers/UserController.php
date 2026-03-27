<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\Customer;
use App\Models\TagsModel;
use App\Models\ContactModel;
use App\Models\AgentReferrralSetting;
use App\Models\Order;
use App\Models\AgentDetail;
use App\Models\CompanyDetail;
use App\Models\PurchaseCriteriaContent;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
// use App\Helper\Helper as Helper;
use Illuminate\Validation\Rule;

class UserController extends Controller
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

         $this->middleware('permission:reward-list', ['only' => ['afrewardlisting','rewardlisting']]);
         $this->middleware('permission:referred-customer-list', ['only' => ['afreferredcustomer','referredcustomer']]);
         $this->middleware('permission:purchase-criteria', ['only' => ['mnpurchasecretirea','updatePurchaseCriteria']]);
         $this->middleware('permission:customer-list', ['only' => ['customerlist','customerprolist']]);
         $this->middleware('permission:order-lead-management', ['only' => ['orderlist']]);
         $this->middleware('permission:referral-setting', ['only' => ['referralsetting']]);
         $this->middleware('permission:customer-edit', ['only' => ['editcustomer','addcustomer']]);


    }


    /**
     * List User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $users = User::with('roles')->wherein('role_id',[2])->orderBy('id','DESC')->get();
        return view('users.index', ['users' => $users, 'admin' => 0]);
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

        return view('users.add', ['roles' => $roles, 'admin' => 0]);
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
            'status'       =>  'required|numeric|in:0,1',
            'password'   => 'required',
        ],['role_id.required'       =>  'The role field is required']);
        // dd($this->generate_referral_code());
        DB::beginTransaction();
        try {
            // create a unique company id
            $companyId = $this->getUniqueCompanyID();

            $user = User::create([
                'referral_code' => $this->generate_referral_code(),
                'company_id'    => $companyId,
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'mobile_number' => $request->mobile_number,
                'role_id'       => $request->role_id,
                'status'        => $request->status,
                'added_by'      => Auth()->user()->id,
                'password'      => Hash::make($request->password)
            ]);

            // set this agent's subdomain too after creation
            if($request->role_id == "2"){
                // sanitized first name for subdomain creation
                $firstNameSanitized = Str::slug($request->first_name);
                $subdomain = $firstNameSanitized . '-' . $companyId;

                User::where('id', $user->id)
                    ->update([
                        'subdomain' => $subdomain,
                        ]);
            }


            // Delete Any Existing Role
            DB::table('model_has_roles')->where('model_id',$user->id)->delete();

            // Assign Role To User
            $user->assignRole($user->role_id);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('agent.index')->with('success','Agent Added Successfully.');
            
        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function generate_referral_code(){
        $agt_id = '1CRAPP-AGT'.rand(100000,999999);
        $agetnt= User::where('referral_code', $agt_id)->first();
        if(is_null($agetnt)){
            return $agt_id;
        }else{
            $this->generate_referral_code();
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
            return redirect()->route('agent.index')->with('error', $validate->errors()->first());
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
            return redirect()->route('agent.index')->with('success','Success ! Agent Updated Successfully.');
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
    // Edit Agent Profile from MDB
    public function edit(User $user)
    {
        $roles = Role::wherein('id',[2])->get();
        // return view('users.edit')->with([
        //     'roles' => $roles,
        //     'user'  => $user,
        //     'admin' => 0
        // ]);
        // $userdata = Auth()->user();
        // dd($user);

        $tags = TagsModel::where(['created_by'=>auth()->user()->id,'status'=>1])->get();
        $contacts = ContactModel::where(['created_by'=>auth()->user()->id,'status'=>1])->get();
        $company = CompanyDetail::where('user_id',$user->id)->first();
        $agentdata = AgentDetail::where('user_id',$user->id)->first();
        return view('users.edit-user', ['admin' => 0,'userdata'=>$user,'company'=>$company,'agentdata'=>$agentdata,'roles'=>$roles,'tags'=>$tags,'contacts'=>$contacts]);
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
        // try {
            // dd($request->all());
            // Store Data
            $user_updated = User::whereId($user->id)->update([
                'referral_code' => $this->referralCodeExists($user->id),
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'mobile_number' => $request->mobile_number,
                'role_id'       => $request->role_id,
                'tag_id'        => $request->tag_id,
                'contact_id'    => $request->contact_id,
                'status'        => $request->status,
            ]);

            $user->tag_id = $request->tag_id;
            $user->contact_id = $request->contact_id;

            // Delete Any Existing Role
            DB::table('model_has_roles')->where('model_id',$user->id)->delete();

            // Assign Role To User
            $user->assignRole($user->role_id);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('agent.index')->with('success','Agent Updated Successfully.');

        // } catch (\Throwable $th) {
        //     // Rollback and return with Error
        //     DB::rollBack();
        //     return redirect()->back()->withInput()->with('error', $th->getMessage());
        // }
    }
    // -----------------------------------------Update Agent Profile--------------------------------------------
    public function update_aagent_details(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if(is_null($user)){

            return redirect()->back()->withInput()->with('error','Agent Not Found!');
        }
        $request->validate([
            'user_id'    => 'required',
            'username'    => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|unique:agents,email,'.$user->id.',id',
            'mobile_number' => 'required|numeric|digits:10',
            'status'       =>  'required|numeric|in:0,1',
        ]);

        // DB::beginTransaction();
        // try {
               $profile ='';
            	if($request->hasfile('profile_pic'))
        		{
        		    $file = $request->file('profile_pic');

        				$profile = 'profile-'.rand().time().'.'.$file->extension();
        				$file->move(public_path('profile'), $profile);

        		}


            // Store Data
            // dd('Profile: '.$profile ? $profile : $user->profile_pic);
            $user = User::findOrFail($user->id); // Retrieve the user by id

            // Update the user's details
            $user->referral_code  = $this->referralCodeExists($user->id);
            $user->first_name  = $request->first_name;
            $user->middle_name = $request->middle_name;
            $user->last_name   = $request->last_name;
            $user->email       = $request->email;
            $user->mobile_number = $request->mobile_number;
            $user->status = $request->status;
            $user->tag_id = $request->tag_id;
            $user->contact_id = $request->contact_id;
            $user->role_id = 2;
            $user->profile_pic = $profile ? $profile : $user->profile_pic;

            // Save the changes to the database
            $user->save();
             // Delete Any Existing Role
             DB::table('model_has_roles')->where('model_id',$user->id)->delete();

             // Assign Role To User
             $user->assignRole($user->role_id);
            // Store Data
            $agentdata = AgentDetail::where('user_id',$user->id)->first();
            if(is_null($agentdata)){
                $agentdata = new AgentDetail();
                 $agentdata->created_at = now();
                 $agentdata->user_id = $user->id;
            }
            $agentdata->username = $request->username;
            if(!Auth()->user()->hasrole('Agent')){
                $agentdata->package = $request->package;
            }
            $agentdata->work = $request->work;
            $agentdata->address = $request->address;
            $agentdata->self_dob = $request->self_dob;
            $agentdata->phone = $request->phone;
            $agentdata->spouce_dob = $request->spouce_dob;
            $agentdata->anniversary_date = $request->anniversary_date;
            $agentdata->numberofchild = $request->numberofchild;
            $agentdata->official_email = $request->official_email;
            $agentdata->personal_website = $request->personal_website;
            $agentdata->working_in = $request->working_in;
            $agentdata->country = $request->country;
            $agentdata->state = $request->state;
            $agentdata->city = $request->city;
            $agentdata->zip = $request->zip;
            $agentdata->updated_at = now();
            $agentdata->save();
            return redirect()->back()->with('success','Account Details Updated Successfully.');

        // } catch (\Throwable $th) {
        //     echo 1; die;
        //     // Rollback and return with Error
        //     DB::rollBack();
        //     return redirect()->back()->withInput()->with('error', $th->getMessage());
        // }
    }

       /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update_agent_company(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if(is_null($user)){
            return redirect()->back()->withInput()->with('error','Agent Not Found!');
        }
        // Validations
        $request->validate([
            'company_name'    => 'required',
            'company_email'     => 'required',

        ]);

        DB::beginTransaction();
        try {

            $company_logo ='';
            if($request->hasfile('company_logo'))
            {
                $file = $request->file('company_logo');
                $company_logo = 'profile-'.rand().time().'.'.$file->extension();
                $file->move(public_path('profile'), $company_logo);
            }else{
                $company_logo = $request->old_company_logo;
            }
            $companydata = CompanyDetail::where('user_id',$user->id)->first();
            if(!$companydata){
                $companydata = new CompanyDetail();
                 $companydata->created_at =now();
                 $companydata->user_id = $user->id;
            }

            $companydata->company_name = $request->company_name;
            $companydata->company_email = $request->company_email;
            $companydata->company_email_type = $request->company_email_type;
            $companydata->company_phone = $request->company_phone;
            $companydata->company_phone_type = $request->company_phone_type;
            $companydata->company_address = $request->company_address;
            $companydata->company_website = $request->company_website;
            $companydata->company_logo = $company_logo;
            $companydata->updated_at = now();
            $companydata->save();
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->back()->with('company-success','Company Details Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('company-error', $th->getMessage());
        }
    }
      /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update_agent_social_networks(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if(is_null($user)){
            return redirect()->back()->withInput()->with('error','Agent Not Found!');
        }
        DB::beginTransaction();
        try {


            $companydata = CompanyDetail::where('user_id',$user->id)->first();
            if(!$companydata){
                $companydata = new CompanyDetail();
                 $companydata->created_at =now();
                 $companydata->user_id = $user->id;
            }

            $companydata->facebook_acc = $request->facebook_acc;
            $companydata->twiter_acc = $request->twiter_acc;
            $companydata->youtube_acc = $request->youtube_acc;
            $companydata->linkedin_acc = $request->linkedin_acc;
            $companydata->telegram_acc = $request->telegram_acc;
            $companydata->skype_acc = $request->skype_acc;
            $companydata->instagram_acc = $request->instagram_acc;
            $companydata->other_acc = $request->other_acc;
            $companydata->updated_at = now();
            $companydata->save();
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->back()->with('social-success','Social Ntework Details Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('social-error', $th->getMessage());
        }
    }


      /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function update_agent_password(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if(is_null($user)){
            return redirect()->back()->withInput()->with('password-error','Agent Not Found!');
        }
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        if($request->new_password != $request->new_confirm_password){
            return redirect()->back()->withInput()->with('password-error','The new password confirmation does not match.');
        }
        if (!\Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }
        try {
            DB::beginTransaction();

            #Update Password
            User::find($user->id)->update(['password'=> Hash::make($request->new_password)]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
           return redirect()->back()->with('password-success','Account Password Updated Successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('password-error', $th->getMessage());
        }
    }
    // -------------------------------------------------------------------------------------
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
            // Delete User
            User::whereId($user->id)->delete();

            DB::commit();
            return redirect()->route('agent.index')->with('success', 'Agent Deleted Successfully!.');

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

        return redirect()->route('agent.index')->with('success', 'Agent Imported Successfully');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'agents.xlsx');
    }

    // unique company id generator
    public function getUniqueCompanyID()
    {
        $number = mt_rand(100000, 999999);
        if ($this->companyIDExists($number)) {
            return $this->getUniqueCompanyID();
        }

        return $number;
    }

    public function companyIDExists($number)
    {
        return User::where('company_id', $number)->exists();
    }
    public function referralCodeExists($id)
    {
        $user = User::whereId($id)->first();
        if(is_null($user->referral_code)){
            return $this->generate_referral_code();
        }else{
            return $user->referral_code;
        }
    }

    public function testFunction()
    {
        $this->getUniqueCompanyID(0);
    }



    public function customersedit()
    {
        return view('customer.customers-edit', ['admin' => 0]);
    }

    public function thanks()
    {
        return view('thanks.thanks', ['admin' => 0]);
    }

    public function paymentfaild()
    {
        return view('thanks.payment-faild', ['admin' => 0]);
    }

    public function cmslist()
    {
        return view('cms.index', ['admin' => 0]);
    }
    public function addcms()
    {
        return view('cms.add-cms', ['admin' => 0]);
    }

    public function editcms()
    {
        return view('cms.edit-cms', ['admin' => 0]);
    }



	public function referredcustomer()
    {
         $referredUsers = Customer::join('agents','users.agent_id','agents.id')->select('users.name','agents.first_name','agents.last_name','users.applied_referral','users.created_at')->whereNotNull('applied_referral')->get();

        return view('affiliatesmanagement.index', ['admin' => 0,'referredUsers'=>$referredUsers]);
    }

    public function rewardlisting()
    {
        $rewards = UserWallet::join('agents','user_wallet.ownerAccount','agents.id')->select('user_wallet.id','user_wallet.ownerAccount','agents.first_name','agents.last_name','user_wallet.amount','user_wallet.status','user_wallet.created_at')->get();
        return view('affiliatesmanagement.reward-listing', ['admin' => 0,'rewards'=> $rewards]);
    }

    public function smtpfrm()
    {
        return view('smtp.index', ['admin' => 0]);
    }

    public function paymentgatways()
    {
        return view('setting.payment-gatways', ['admin' => 0]);
    }

    public function brandingsfrm()
    {
        return view('setting.brandings', ['admin' => 0]);
    }

    public function myaccountfrm()
    {
        return view('myaccount.index', ['admin' => 0]);
    }
    public function billinglist()
    {
        return view('billing.index', ['admin' => 0]);
    }

    public function afrewardlisting()
    {
        return view('affiliateearning.reward-listing', ['admin' => 0]);
    }
    public function afreferredcustomer()
    {
        return view('affiliateearning.referred-customer', ['admin' => 0]);
    }

    public function referralsetting()
    {
        $setting  = AgentReferrralSetting::where('agent_id',auth()->user()->id)->first();
        return view('affiliateearning.referral-setting', ['admin' => 0,'setting'=>$setting]);
    }
    public function orderlist()
    {
        $orders = Order::join('users','users.id','orders.user_id')->join('agents','agents.id','users.agent_id')->where('agents.id',Auth()->user()->id)->select('orders.*')->orderBy('orders.id', 'DESC')->get();

        return view('orderleadsmanagement.order-list', ['admin' => 0,'orders'=>$orders]);
    }

    public function customerlist()
    {
        return view('customermanagement.index', ['admin' => 0]);
    }

    public function editcustomer()
    {
        return view('customermanagement.customers-edits', ['admin' => 0]);
    }

    public function customerprolist()
    {
        return view('customermanagement.customer-portfolio-list', ['admin' => 0]);
    }

    public function addcustomer()
    {
        return view('customermanagement.add-customers', ['admin' => 0]);
    }

    public function productsslist()
    {
        return view('productservices.index', ['admin' => 0]);
    }

    public function addproductservss()
    {
        return view('productservices.add-product-services', ['admin' => 0]);
    }

    public function editproductservss()
    {
        return view('productservices.edit-product-services', ['admin' => 0]);
    }

	public function resourseslist()
    {
        return view('resourses.index', ['admin' => 0]);
    }

	public function addresourses()
    {
        return view('resourses.add-resourses', ['admin' => 0]);
    }

	public function editresourses()
    {
        return view('resourses.edit-resourses', ['admin' => 0]);
    }


	public function propertymarketlist()
    {
        return view('propertymarket.index', ['admin' => 0]);
    }

	public function addpropertymarket()
    {
        return view('propertymarket.add-propertymarket', ['admin' => 0]);
    }

	public function editpropertymarket()
    {
        return view('propertymarket.edit-propertymarket', ['admin' => 0]);
    }


	public function triggernotificationlist()
    {
        return view('triggernotification.index', ['admin' => 0]);
    }

	public function addtriggernotification()
    {
        return view('triggernotification.add-triggernotification', ['admin' => 0]);
    }

	public function edittriggernotification()
    {
        return view('triggernotification.edit-triggernotification', ['admin' => 0]);
    }

	public function ticketscustomercarelist()
    {
        return view('ticketscustomercare.index', ['admin' => 0]);
    }


/// new ////
	public function planaddlist()
    {
        return view('planadd.index', ['admin' => 0]);
    }
    public function addplan()
    {
        return view('planadd.add-plan', ['admin' => 0]);
    }
    public function editplan()
    {
        return view('planadd.edit-plan', ['admin' => 0]);
    }
/// end new ///


	public function createtickets()
    {
        return view('ticketscustomercare.create-tickets', ['admin' => 0]);
    }

	public function ticketsdetails()
    {
        return view('ticketscustomercare.tickets-details', ['admin' => 0]);
    }

	public function mnpurchasecretirea()
    {
        $data = PurchaseCriteriaContent::where('user_id',Auth()->user()->id)->first();
        return view('purchasecretirea.index', ['data'=>$data,'admin' => 0]);
    }

      public function updatePurchaseCriteria(Request $request)
    {
         // Validations
        $request->validate([
            'purchase_price_content'       =>  'required',
            'purchase_price_link'       =>  'required',
            'total_cash_needed_content'       =>  'required',
            'total_cash_needed_link'       =>  'required',
        ]);

        DB::beginTransaction();
        try {
            // Delete User
            $data = PurchaseCriteriaContent::where('user_id',Auth()->user()->id)->first();
            if(!$data){
                $data = new PurchaseCriteriaContent;
                 $data->created_at = now();
            }
            $data->user_id = Auth()->user()->id;
            $data->purchase_price_content = $request->purchase_price_content;
            $data->purchase_price_link = $request->purchase_price_content;
            $data->total_cash_needed_content = $request->total_cash_needed_content;
            $data->total_cash_needed_link = $request->total_cash_needed_link;
            $data->updated_at = now();
            $data->save();



            DB::commit();
            return redirect()->route('purchasecretirea.mnpurchasecretirea')->with('success', 'Purchase Criteria Updated Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


	public function buyholdprojectionlist()
    {
        return view('buyholdprojection.index', ['admin' => 0]);
    }

      /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    public function payReward(Request $request)
    {
         // Validations
        $request->validate([
            'id'       =>  'required|numeric',
        ]);


        DB::beginTransaction();
        try {
            // Delete User
            $userwallet = UserWallet::whereId($request->id)->first();
            $userwallet->status = 1;
            $userwallet->save();

            $userData = User::whereId($userwallet->ownerAccount)->first();

            DB::commit();
            return redirect()->route('affiliatesmanagement.rewardlisting')->with('success', 'Amount Paid Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
      /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    public function updateReferralSetting(Request $request)
    {
         // Validations
        $request->validate([
            'welcome_bonus'       =>  'required|numeric',
            'referral_points'       =>  'required|numeric',
            // 'level1_perc'       =>  'required|numeric',
            // 'level2_perc'       =>  'required|numeric',
            // 'level3_perc'       =>  'required|numeric',
        ]);


        DB::beginTransaction();
        try {
            // Delete User
            $referrral = AgentReferrralSetting::where('agent_id',auth()->user()->id)->first();
            if(!$referrral){
                $referrral = new AgentReferrralSetting();

            $referrral->agent_id = auth()->user()->id;

            $referrral->created_at = now();

            }
            $referrral->welcome_bonus = $request->welcome_bonus;
            $referrral->referral_points = $request->referral_points;
            // $referrral->level1_perc = $request->level1_perc;
            // $referrral->level2_perc = $request->level2_perc;
            // $referrral->level3_perc = $request->level3_perc;
            $referrral->updated_at = now();
            $referrral->save();


            DB::commit();
            return redirect()->back()->with('success', 'Setting Updated Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit_domain_details($user_id)
    {
        // $authUser = auth()->user();

        // Allow only: master admin (role_id == 1) OR agent (role_id == 2) editing their own record
        // if (!($authUser->role_id == 1 || ($authUser->role_id == 2 && $authUser->id == $user))) {
        //     abort(403, 'Unauthorized action.');
        // }
        $user = User::with('roles')->where('id',$user_id)->first();
        if(Auth()->user()->role_id == 2){
            $user = User::with('roles')->where('id', Auth()->user()->id)->first();
            if($user->id != $user_id){
                return redirect()->back()->with('error','You Entered Wrond Url.');
            }
        }
        if(is_null($user)){
            return redirect()->back()->with('error','No Data Found!');
        }
        
        $agent = User::select('id', 'subdomain', 'custom_domain')->findOrFail($user->id);
        // dd($agent);

        return view('users.edit-domain', compact('agent'));
    }

    public function update_domain_details(Request $request)
    {
     
        $res = $request->validate([
            'user_id' => 'required',
            'subdomain' => [
                'required',
                'string',
                Rule::unique('agents', 'subdomain')->ignore($request->user_id, 'id'),
            ],
            'custom_domain' => [
                'nullable',
                'string',
                Rule::unique('agents', 'custom_domain')->ignore($request->user_id, 'id'),
            ],
        ]);
        // dd($res);
        $agent = User::findOrFail($request->user_id);
        $agent->subdomain = $request->subdomain;
        $agent->custom_domain = $request->custom_domain;
        $agent->save();

        return redirect()->back()->with('success', 'Domain details updated successfully!');
    }
    
    
    public function subscription($agent_id){
        $plans = SubscriptionPlan::where(['status' => 1])->orderBy('priority', 'ASC')->get();
        $payments = Payment::select('payments.*', 'subscription_plans.title as plan_title')
        ->leftjoin('subscription_plans', 'subscription_plans.id', '=', 'payments.plan_id')
        ->where(['payments.user_id' => $agent_id])
        ->get();
        $agent = User::select('agents.*','subscription_plans.title as package_title')
        ->leftjoin('subscription_plans', 'subscription_plans.id', '=', 'agents.package_id')
        ->where('agents.id', $agent_id)->first();
        // dd($agent);
        return view('users.subscription-plan', compact('agent', 'payments'));
    }


}
