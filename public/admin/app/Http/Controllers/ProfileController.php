<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\Customer;
use App\Models\TagsModel;
use App\Models\ContactModel;
use App\Models\AgentDetail;
use App\Models\CompanyDetail;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
// use App\Helper\Helper as Helper;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index']]);
        // $this->middleware('permission:user-create', ['only' => ['create','store', 'updateStatus']]);
        // $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }
 

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request)
    {
        $user = Auth()->user();
        // Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number'     => 'required',
            'email'         => 'required|unique:agents,email,'.$user->id.',id',
        ]);
        
        try {
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
            $user->first_name  = $request->first_name;
            $user->middle_name = $request->middle_name;
            $user->last_name   = $request->last_name;
            $user->email       = $request->email;
            $user->mobile_number = $request->mobile_number;
            $user->profile_pic = $profile ? $profile : $user->profile_pic;
            
            // Save the changes to the database
            $user->save();
            // Store Data
            $agentdata = AgentDetail::where('user_id',$user->id)->first();
            if(is_null($agentdata)){
                $agentdata = new AgentDetail();
                 $agentdata->created_at = now();
                 $agentdata->user_id = $user->id;
            }
            $agentdata->username = $request->username;
            $agentdata->package = $request->package;
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
            return redirect()->route('myaccount.myaccountfrm')->with('success','Account Details Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
    
       /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function updateCompany(Request $request)
    {
        $user = Auth()->user();
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
                $company_logo = asset('profile/'.$company_logo);
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
            return redirect()->route('myaccount.myaccountfrm')->with('company-success','Company Details Updated Successfully.');

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
    public function updateAccounts(Request $request)
    {
        $user = Auth()->user();
      

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
            return redirect()->route('myaccount.myaccountfrm')->with('social-success','Social Ntework Details Updated Successfully.');

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
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        if (!\Hash::check($request->current_password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }
        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            
            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
           return redirect()->route('myaccount.myaccountfrm')->with('password-success','Account Password Updated Successfully.');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('password-error', $th->getMessage());
        }
    }
    public function checkusername(Request $request){
        $request->validate([
            'username' => 'required',
        ]);
        $user = DB::table('agent_details')
        ->where('username', $request->username)
        ->where('user_id', '!=', auth()->user()->id)
        ->first();
    
        // Check if user exists
        if (is_null($user)) {
            return response()->json([
                'status' => true,
            ]); 
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }
    public function myaccountfrm()
    {
        $userdata = Auth()->user();
        $tags = TagsModel::where(['created_by'=>auth()->user()->id,'status'=>1])->get();
        $contacts = ContactModel::where(['created_by'=>auth()->user()->id,'status'=>1])->get();
        // dd($userdata);
        $company = CompanyDetail::where('user_id',$userdata->id)->first();
        $agentdata = AgentDetail::where('user_id',$userdata->id)->first();
        return view('myaccount.index', ['admin' => 0,'userdata'=>$userdata,'company'=>$company,'agentdata'=>$agentdata,'tags'=>$tags,'contacts'=>$contacts]);
    }
}