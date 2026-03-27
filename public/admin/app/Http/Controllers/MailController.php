<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\GiftMailModel;
use App\Models\AgentDetail;
use App\Models\SubscriptionPlan;
use App\Models\MailCategoryModel;
use App\Models\FormModel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\AgentLeadMail;
use Illuminate\Support\Facades\File;
// use App\Helper\Helper as Helper;

class MailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $lists = GiftMailModel::select('tbl_giftmail.*','tbl_mailcategory.title as category_name')
        ->join('tbl_mailcategory','tbl_mailcategory.id','=','tbl_giftmail.category')
        ->orderBy('tbl_giftmail.id','DESC')
        ->where('tbl_giftmail.created_by',auth()->user()->id)->get();
        return view('mail.index',compact('lists'));
    }
    public function create_gift_mail(){
        $categories = MailCategoryModel::orderBy('id','DESC')->where(['status'=>1, 'created_by'=>auth()->user()->id])->get();
        return view('mail.create-mail',compact('categories'));
    }
    public function store_gift_mail(Request $request){
        // dd($request->all());
        $request->validate([
            'category'=>'required',
            'temp_name'=>'required',
            'celebration_title'=>'required',
            'title'=>'required',
            'subject'=>'required',
            'agent_subject'=>'required',
            'content'=>'required',
            'status'=>'required',
        ]);
        if($request->id){
            $gift_mail = GiftMailModel::find($request->id);
            $msg = 'Mail Updated Successfully!';
            if($request->id) {
                $imagePath = public_path($gift_mail->logo);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        }else{
            $agent = AgentDetail::where('user_id',auth()->user()->id)->first();
            if(is_null($agent)){
                return redirect()->back()->with('error','Please Update Your Profile!');
            }
            $plan = SubscriptionPlan::where('id',$agent->package)->first();
            if(is_null($plan)){
                return redirect()->back()->with('error','Plan Not Found!');
            }
            if($plan->mail_temp_status != 1){
                return redirect()->back()->with('error','No Gift Mail For Your Plan. Please contact the 1cr team!');
            }
            $count = GiftMailModel::where(['created_by'=>auth()->user()->id,'deleted_at'=> NULL])->count();
            // dd($plan->total_mail_temp);
            if($count >= $plan->total_mail_temp){
                return redirect()->back()->with('error','You`ve reached your maximum Gift Mail limit. For assistance or to upgrade your plan, please reach out to the 1cr team.');
            }
            $gift_mail = new GiftMailModel();
            $msg = 'Mail Created Successfully!';

        }
        if($request->hasFile('logo')) {
            $logoName = $this->set_logoname(time() . '_' . $request->logo->getClientOriginalName());
            // dd($logoName);
            $request->logo->move(public_path('uploads'), $logoName);
            $logo_name = 'uploads/'.$logoName;
        }else{
            $logo_name = base64_decode($request->old_logo);
        }
        $gift_mail->user_id = auth()->user()->id;
        $gift_mail->category = $request->category;
        $gift_mail->title = $request->title;
        $gift_mail->temp_name = $request->temp_name;
        $gift_mail->celebration_title = $request->celebration_title;
        $gift_mail->subject = $request->subject;
        $gift_mail->agent_subject = $request->agent_subject;
        $gift_mail->content = $request->content;
        $gift_mail->cta_visible = $request->cta_visible;
        $gift_mail->cta_type = $request->cta_type;
        $gift_mail->cta_link = $request->success_destination;
        $gift_mail->cta_title = $request->cta_title;
        $gift_mail->cta_text = $request->cta_text;
        $gift_mail->signature_visible = $request->signature_visible;
        $gift_mail->sign_name = $request->sign_name;
        $gift_mail->sign_web = $request->sign_web;
        $gift_mail->sign_email = $request->sign_email;
        $gift_mail->sign_phone = $request->sign_phone;
        $gift_mail->ps_visible = $request->ps_visible;
        $gift_mail->ps_title = $request->ps_title;
        $gift_mail->ps_link = $request->ps_link;
        $gift_mail->logo = $logo_name;
        $gift_mail->status = $request->status;
        $gift_mail->created_by = auth()->user()->id;
        if($gift_mail->save()){
            return redirect()->route('mail.index')->with('success',$msg);
        }else{
            return redirect()->back()->with('error',$msg);
        }
    }
    public function set_logoname($logoName)
    {
        $pathInfo = pathinfo($logoName);
        $name = preg_replace('/\s+/', '-', trim($pathInfo['filename']));
        $name = preg_replace('/[^A-Za-z0-9\-_.]/', '', $name);
        $name = strtolower($name);
        $extension = isset($pathInfo['extension']) ? '.' . strtolower($pathInfo['extension']) : '';
        return $name . $extension;
    }
    public function edit_mail($id){
        $categories = MailCategoryModel::orderBy('id','DESC')->where(['status'=>1, 'created_by'=>auth()->user()->id])->get();
        $details = GiftMailModel::find($id);
        return view('mail.create-mail',compact('categories','details'));
    }
    public function delete_mail($id){
        $existinform = FormModel::where('welcome_email',$id)->exists();
        if($existinform){
            return redirect()->back()->with('error','This email cannot be deleted as it is already in use!');
        }
        $gift_mail = GiftMailModel::find($id);

        if($id) {
            $imagePath = public_path($gift_mail->logo);
            if (File::exists($imagePath)){
                File::delete($imagePath);
            }
        }
        $gift_mail->delete();
        return redirect()->back()->with('success','Mail Deleted Successfully!');
    }
    public function view_mail($id){
        $gift_mail = GiftMailModel::find($id);
        $data = $gift_mail->toArray();
        $agent = AgentDetail::where('user_id',auth()->user()->id)->first();
        if(is_null($agent)){
            return redirect()->back()->with('error','Please Update Your Profile!');
        }
        if($agent->package == 2){
            return view('mail.template.free-mail',compact('data'));
        }else{
            return view('mail.template.free-mail',compact('data'));
        }
    }

    // mail category
     public function mail_category(){
        //  $lists = MailCategoryModel::orderBy('id','DESC')->where('created_by',auth()->user()->id)->get();
         $lists = MailCategoryModel::orderBy('id','DESC')->get();
         return view('mail.mail-category.index',compact('lists'));
     }
     public function create_mail_category(){
        // return redirect()->route('mail-category.index')->with('error','Unable to create the mail category with out configuration.');
         return view('mail.mail-category.create');
     }
     public function store_mail_category(Request $request){

         $request->validate([
             'title'=>'required',
             'status'=>'required',
         ]);
         if($request->id){
             $mail_cat = MailCategoryModel::find($request->id);
             $msg = 'Mail Category Updated Successfully!';
         }else{
             $mail_cat = new MailCategoryModel();
             $msg = 'Mail Category Created Successfully!';
         }
         $mail_cat->title = $request->title;
         $mail_cat->status = $request->status;
         $mail_cat->created_by = auth()->user()->id;
         $mail_cat->save();
         return redirect()->route('mail-category.index')->with('success',$msg);
     }
     public function edit_mail_category($id){
         $details = MailCategoryModel::find($id);
         return view('mail.mail-category.create',compact('details'));
     }
     public function delete_mail_category($id){
        $existing = GiftMailModel::where('category',$id)->exists();
        if($existing){
            return redirect()->back()->with('error','This category cannot be deleted as it is already in use!');
        }
        //  $mail_cat = MailCategoryModel::find($id);
        //  $mail_cat->delete();
        //  return redirect()->route('mail-category.index')->with('success','Mail Category Deleted Successfully!');
         return redirect()->route('mail-category.index')->with('error','Unable to delete the mail category as it is currently in use.');
     }
    public function testmail(){
        $to = '24k@yopmail.com';
        $data['name'] = 'abc';
        $data['email'] = 'abc@gmail.com';
        $data['phone'] = '9878767656';
        Mail::to($to)->send(new AgentLeadMail($data));
        dd($to);
    }
}