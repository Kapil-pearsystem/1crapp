<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PaymentSetting; 
use App\Models\BrandingSetting;
use App\Models\SmtpSetting;
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

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:smtp', ['only' => ['smtpfrm','updateSmtp']]);
        $this->middleware('permission:payment-gateway', ['only' => ['paymentgatways','updatePaymentGateway']]);
        $this->middleware('permission:branding', ['only' => ['brandingsfrm','updateBranding']]);  
         


    }

 

    /**
     * Update Payment Gateway Setting
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function paymentgatways($user_id)
    {
        $data = User::with('roles')->where('id',$user_id)->first();
        if(Auth()->user()->role_id == 2){
            $data = User::with('roles')->where('id', Auth()->user()->id)->first();
            if($data->id != $user_id){
                return redirect()->back()->with('error','You Entered Wrond Url.');
            }
        }
        if(is_null($data)){
            return redirect()->back()->with('error','No Data Found!');
        }
        
        // dd($data);
        $paymentdata = PaymentSetting::where('user_id',$data->id)->where('gateway_type','razor_pay')->first();
        $paymentdata2 = PaymentSetting::where('user_id',$user_id)->where('gateway_type','instamojo')->first(); 
        return view('setting.payment-gatways', ['admin' => 0,'paymentdata'=>$paymentdata,'paymentdata2'=>$paymentdata2, 'data'=>$data]);
    }
    public function updatePaymentGateway(Request $request)
    {
        // Validation
       
        
       $request->validate([
            'user_id'    => 'required',
            'role_id'    => 'required',
            'api_key'    => 'required',
            'api_secret'     => 'required',
            'callback_url'         => 'required',
            'status' => 'required',
            
        ]);

        $user_id = $request->user_id;
        $role_id = $request->role_id;
        // If Validations Fails
      /*  if($validate->fails()){
            return redirect()->route('setting.paymentgatways')->with('error', $validate->errors()->first());
        }*/
        
        if($request->status==1 && $request->instamojo_status==1){
            return redirect()->back()->with('error', 'Only one payment gateway can be active');
        }

        try {
            DB::beginTransaction();
                
                $razordata = PaymentSetting::where('user_id',$user_id)->where('gateway_type','razor_pay')->first();
                
                if(!$razordata){
                      PaymentSetting::insert([
                            'api_key'   => $request->api_key,
                            'gateway_type'    => 'razor_pay',
                            'user_id'    => $user_id,
                            'role_id' => $role_id,
                            'api_secret'    => $request->api_secret,
                            'callback_url'    => $request->callback_url,
                            'status'    => $request->status,
                            'created_at'    => now(),
                            'updated_at'    => now()
                    ]);
                }else{
                      PaymentSetting::where('user_id',$user_id)->where('gateway_type','razor_pay')->update([
                            'api_key'   => $request->api_key, 
                            'api_secret'    => $request->api_secret,
                            'callback_url'    => $request->callback_url,
                            'status'    => $request->status, 
                            'updated_at'    => now()
                         ]);
                }
                
                
                $instamojodata = PaymentSetting::where('user_id',$user_id)->where('gateway_type','instamojo')->first();
                
                if(!$razordata){
                      PaymentSetting::insert([
                            'api_key'   => $request->instamojo_api_key,
                            'gateway_type'    => 'instamojo',
                            'user_id'    => $user_id,
                            'role_id' => $role_id,
                            'api_secret'    => $request->instamojo_api_secret,
                            'callback_url'    => $request->instamojo_callback_url,
                            'status'    => $request->instamojo_status,
                            'created_at'    => now(),
                            'updated_at'    => now()
                    ]);
                }else{
                       PaymentSetting::where('user_id',$user_id)->where('gateway_type','instamojo')->update([
                            'api_key'   => $request->instamojo_api_key, 
                            'api_secret'    => $request->instamojo_api_secret,
                            'callback_url'    => $request->instamojo_callback_url,
                            'status'    => $request->instamojo_status, 
                            'updated_at'    => now()
                         ]);
                }
           
              
            
             

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->back()->with('success','Payment Setting Updated Successfully!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    

    /**
     * Update Payment Gateway Setting
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
     public function brandingsfrm($user_id)
    {  
        $data = User::with('roles')->where('id',$user_id)->first();
        if(Auth()->user()->role_id == 2){
            $data = User::with('roles')->where('id', Auth()->user()->id)->first();
            if($data->id != $user_id){
                return redirect()->back()->with('error','You Entered Wrond Url.');
            }
        }
        if(is_null($data)){
            return redirect()->back()->with('error','No Data Found!');
        }
        $brandingdata = BrandingSetting::where('user_id',$data->id)->first();
        
        return view('setting.brandings', ['admin' => 0,'brandingdata'=>$brandingdata,'data'=>$data]);
    }
    public function updateBranding(Request $request)
    {
       
        
        $request->validate([
            'user_id'    => 'required',
            'role_id'    => 'required',
            'title'    => 'required',
            'prepared_by'  => 'required',
            'email'        => 'required',
            'phone' => 'required',
        ]);

        // dd($request->all());

        // If Validations Fails
       /* if($validate->fails()){
            return redirect()->route('setting.brandings')->with('error', $validate->errors()->first());
        }*/
        $user_id = $request->user_id;
        $role_id = $request->role_id;
        try {
            DB::beginTransaction();
            $brandingdata = BrandingSetting::where('user_id',$user_id)->first();
            if($brandingdata){
                $favicon = $brandingdata->favicon;
                $logo = $brandingdata->logo;
            }else{
                $favicon = '';
                $logo = '';
            }
           
            
        if(!empty($request->logo))
		{
	    	$profile_imagefileName = time().rand().'.'.$request->logo->extension();		
            $request->logo->move(public_path('img'), $profile_imagefileName);
			$logo =$profile_imagefileName;
		}
		
		 if(!empty($request->favicon))
		{
	    	$profile_imagefileName2 = time().rand().'.'.$request->favicon->extension();		
            $request->favicon->move(public_path('img'), $profile_imagefileName2);
			$favicon =$profile_imagefileName2;
		}
		

        // Update Status with reason
       BrandingSetting::updateOrCreate(
            ['user_id' => $user_id], // condition to check
            [
                'role_id'       => $role_id,
                'title'       => $request->title,
                'prepared_by' => $request->prepared_by,
                'phone'       => $request->phone,
                'email'       => $request->email,
                'logo'        => $logo,
                'favicon'     => $favicon,
                'theme_color'     => $request->color,
                'updated_at'  => now(),
                'created_at'  => now(), // not required – Laravel handles this on create
            ]
        );
       
            
            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->back()->with('success','Branding Setting Updated Successfully!');
        } catch (\Throwable $th) {
            
            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    
    /**
     * Update Payment Gateway Setting
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function smtpfrm($user_id)
    {
        $data = User::with('roles')->where('id',$user_id)->first();
        if(Auth()->user()->role_id == 2){
            $data = User::with('roles')->where('id', Auth()->user()->id)->first();
            if($data->id != $user_id){
                return redirect()->back()->with('error','You Entered Wrond Url.');
            }
        }
       
        if(is_null($data)){
            return redirect()->back()->with('error','No Data Found!');
        }
        $smtpdata = SmtpSetting::where('user_id',$data->id)->first();
        return view('smtp.index', ['admin' => 0,'smtpdata'=>$smtpdata,'data'=>$data]);
    }
    public function updateSmtp(Request $request)
    {
        $request->validate([
            'user_id'    => 'required',
            'role_id'    => 'required',
            'host'    => 'required',
            'username'     => 'required',
            'password'         => 'required',
            'port' => 'required',
            'enc_type' => 'required',
        ]);
        // If Validations Fails
       /* if($validate->fails()){
            return redirect()->route('setting.brandings')->with('error', $validate->errors()->first());
        }*/
        $user_id = $request->user_id;
        $role_id = $request->role_id;
        try {
            DB::beginTransaction();
        $existingdata =  SmtpSetting::where('user_id',$user_id)->first();
        if($existingdata){
             // Update Status with reason
            SmtpSetting::where('user_id',$user_id)->update([

                'mailer'   => $request->mailer,
                'host'   => $request->host,
                'username'    => $request->username,
                'password'    => $request->password,
                'port'    => $request->port,
                'enc_type'    => $request->enc_type,
                'from_name'    => $request->from_name,
                'from_address'    => $request->from_address,
                'updated_at'    => now()
            ]);
        }else{
             SmtpSetting::where('user_id',$user_id)->insert([

                'mailer'   => $request->mailer,
                'host'   => $request->host,
                'user_id'   => $user_id,
                'role_id' => $role_id,
                'username'    => $request->username,
                'password'    => $request->password,
                'port'    => $request->port,
                'enc_type'    => $request->enc_type,
                'from_name'    => $request->from_name,
                'from_address'    => $request->from_address,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
        }


            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->back()->with('success','SMTP Setting Updated Successfully!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


   

    

  
    

}