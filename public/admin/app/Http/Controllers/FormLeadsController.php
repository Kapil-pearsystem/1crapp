<?php

namespace App\Http\Controllers;

use App\Models\EnquiryModel;
use Illuminate\Support\Facades\Mail;
use App\Models\FormModel;
use App\Models\User;
use App\Models\CDOModel;
use App\Models\GiftMailModel;
use App\Models\ProductService;
use App\Models\UserDetails;
use App\Models\FormSourceModel;
use Illuminate\Http\Request;
use App\Mail\AgentLeadMail;
use App\Mail\CustomerLeadMail;
use App\Mail\SendLinkviaEmail;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;

class FormLeadsController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'form_id'    => 'required',
                'name'       => 'required|string|max:255',
                'email'      => 'required|email|max:255',
                'company'    => 'nullable|string|max:255',
                'contact_no' => 'nullable|string|max:15',
                'message'    => 'nullable|string',
            ]);
            $formId = base64_decode($validatedData['form_id']);
            $form = FormModel::findOrFail($formId);
            $source = FormSourceModel::select('id','title')->where('id',$form->source_id)->first();
            $agent = User::select('id','email')->where('id',$form->created_by)->first();
            $cdo = CDOModel::select('name')->where('id',$request->company)->first();
            $p_services = ProductService::select('id','prod_name')->where(['id' => $request->ps_id, 'status' => 1])->first();
            // return $agent;

            $mail = GiftMailModel::findOrFail($form->welcome_email);
            // dd($p_services);

            // set for customer
            $customer = Customer::where('email', $request->email)->first();
            if(is_null($customer)){
                $member_id = $this->generate_member_id();
                $customer = new Customer();
                $customer->memberid = $member_id;
                $customer->type = 2;
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->mobile = $request->contact_no;
                $customer->password = \Hash::make('1CRAPPNEW');
                $customer->recover_pass = base64_encode('1CRAPPNEW');
                $customer->tag_id = $form->tag_id;
                $customer->contact_id = $form->list_id;
                $customer->agent_id = $agent->id;
                $customer->status = 1;
                $customer->created_at = now();
                $customer->updated_at = now();
                $customer->save();
                // set details
                UserDetails::create([
                    'user_id'    => $customer->id,
                    'worked_in'    => $request->company,
                    'phone'       => $request->contact_no,
                ]);
            }else{
                $c_list = $customer->contact_id;
                $c_list = $c_list ? explode(',', $c_list) : [];
                if (!in_array($form->list_id, $c_list)) {
                    $c_list[] = $form->list_id;
                    $customer->contact_id = implode(',', $c_list);
                    $customer->save();
                }

            }
            // Enquiry
            $formLead = EnquiryModel::create([
                'form_id'    => $formId,
                'customer_id' => $customer->id,
                'name'       => $request->name,
                'email'      => $request->email,
                'cdo_id'    => $request->company ?? null,
                'ps_id'    => $request->ps_id ?? null,
                'phone' => $request->contact_no ?? null,
                'message'    => $request->message ?? null,
            ]);
            // send mail
            $maildata = array();
            $maildata['subject'] = $mail->subject??'1CR APP Leads';
            $maildata['agent_subject'] = $mail->agent_subject??'1CR APP Leads';
            $maildata['form_name'] = $form->title??NULL;
            $maildata['source'] = $source->title??NULL;
            $maildata['email'] = $request->email??NULL;
            $maildata['phone'] = $request->contact_no??NULL;
            $maildata['name'] = $request->name??NULL;
            $maildata['message'] = $request->message??NULL;
            $maildata['cdo'] = $cdo->name??NULL;
            $maildata['ps_name'] = $p_services->prod_name??NULL;
            $maildata['mail_logo'] = asset('').$mail->logo??WEB_BASE_URL.'img/1crlogo.png';
            $maildata['mail'] = $mail;
            $maildata['mail_title'] = $mail->title??NULL;
            // dd($maildata);
            // $data = $maildata;
            // return view('mail-temp.customer-lead-mail',compact('data'));
            // return view('mail-temp.agent-lead-mail',compact('data'));
            // set for customer
            $res = Mail::to($request->email)->send(new CustomerLeadMail($maildata));
            // dd($res);
            if($form->fe_visible){
                Mail::to($form->forword_email)->cc($agent->email)->send(new AgentLeadMail($maildata));
            }else{
                Mail::to($agent->email)->send(new AgentLeadMail($maildata));
            }
            if ($request->form_type != 'appointment') {
                if (!empty($form->success_destination)) {
                    return redirect()->to($form->success_destination);
                }
            }
            return response()->json([
                'status' => true,
                'data'   => $formLead,
                'msg'    => 'Lead submitted successfully!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'data'   => null,
                'msg'    => $e->getMessage(),
            ], 500);
        }
    }

    public function generate_member_id(){
        $mem_id = '1CRAPP-MEM'.rand(10000,99999);
        $customer = Customer::where('memberid', $mem_id)->first();
        if(is_null($customer)){
            return $mem_id;
        }else{
            $this->generate_member_id();
        }
    }
    function send_link_via_email(Request $request){
        $customer_id = $request->customer_id;
        $mail_id = $request->mail_id;
        $enquiry = EnquiryModel::findOrFail($customer_id);
        $customer = Customer::where('id', $enquiry->customer_id)->first();
        $mail = GiftMailModel::findOrFail($mail_id);
        $form = FormModel::findOrFail($enquiry->form_id);
        $source = FormSourceModel::select('id','title')->where('id',$form->source_id)->first();
        $cdo = CDOModel::select('name')->where('id',$enquiry->cdo_id)->first();
        $p_services = ProductService::select('id','prod_name')->where(['id' => $enquiry->ps_id, 'status' => 1])->first();

        $maildata = array();
        $maildata['subject'] = $mail->subject??'1CR APP Leads';
        $maildata['agent_subject'] = $mail->agent_subject??'1CR APP Leads';
        $maildata['form_name'] = $form->title??NULL;
        $maildata['source'] = $source->title??NULL;
        $maildata['email'] = $customer->email??NULL;
        $maildata['phone'] = $enquiry->phone??NULL;
        $maildata['name'] = $enquiry->name??NULL;
        $maildata['message'] = $enquiry->message??NULL;
        $maildata['cdo'] = $cdo->name??NULL;
        $maildata['ps_name'] = $p_services->prod_name??NULL;
        $maildata['mail_logo'] = asset('').$mail->logo??WEB_BASE_URL.'img/1crlogo.png';
        $maildata['mail_title'] = $mail->title??NULL;
        $maildata['mail'] = $mail;
        // print_r($maildata); die;
        //  $data = $maildata;
        // return view('mail-temp.send-link-via-email',compact('data'));
        $res = Mail::to($customer->email)->send(new SendLinkviaEmail($maildata));
        // dd($res);
        return redirect()->back()->with('success','Mail Send Successfully!');
        // if($form->fe_visible){
        //     Mail::to($form->forword_email)->cc($agent->email)->send(new AgentLeadMail($maildata));
        // }else{
        //     Mail::to($agent->email)->send(new AgentLeadMail($maildata));
        // }
    }


}

