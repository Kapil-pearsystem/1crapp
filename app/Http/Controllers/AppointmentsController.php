<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use App\Models\AppointmentBookingModel;
use App\Models\AppointmentBookingHomeworkModel;

class AppointmentsController extends Controller
{
    public function index($page)
    {
        // dd($page);  ,'created_by'=>app('currentAgent')->id
        $booking = AppointmentBookingModel::where(['status'=>1, 'slug'=>$page, 'created_by'=>app('currentAgent')->id])->first();
        if(is_null($booking)){
            abort(404);
        }
        // dd($booking);
        return view('front.calendar-booking', compact('booking'));
    }
    public function homework($page)
    {
        $agent_id = app('currentAgent')->id??78;
        // dd($page);  ,'created_by'=>app('currentAgent')->id
        $homework = AppointmentBookingHomeworkModel::select('*','tbl_filedrive.title as file_name', 'tbl_filedrive.path as file_path', 'tbl_appointment_thankyou.slug as thankyou_path')
        ->join('tbl_calender', 'tbl_calender.homework_page_id','=','tbl_appointment_booking_homework.id')
        ->join('tbl_appointment_thankyou', 'tbl_appointment_thankyou.id','=','tbl_calender.thank_you_id')
        ->leftjoin('tbl_filedrive', 'tbl_filedrive.id','=','tbl_appointment_booking_homework.file_drive_id')
        ->where(['tbl_appointment_booking_homework.status'=>1, 'tbl_appointment_booking_homework.slug'=>$page, 'tbl_appointment_booking_homework.created_by'=>$agent_id])->first();
        if(is_null($homework)){
            abort(404);
        }
        // dd($homework);
        $data = DB::table('tbl_form')->where('id', $homework->form_id)->first();
        $cdos = DB::table('tbl_cdo')->select('id','name')->where(['created_by' => $agent_id, 'status' => 1])->get();
        $p_services = DB::table('product_services')->select('id','prod_name')->where(['agent_id' => $agent_id, 'status' => 1])->get();
        $form_data = view('front.form-embeded',compact('data','cdos','p_services', 'homework'))->render();
        // $form_data = htmlspecialchars($html);
        return view('front.call-booking-homework', compact('homework','form_data'));
    }
    public function thankyou($page){
        $data = DB::table('tbl_appointment_thankyou')->select('tbl_appointment_thankyou.*', 'tbl_page.page_name', 'tbl_page.slug as page_slug')
        ->leftjoin('tbl_page', 'tbl_page.id','=','tbl_appointment_thankyou.cta_page_id')
        ->where(['tbl_appointment_thankyou.slug'=> $page, 'tbl_appointment_thankyou.created_by'=>app('currentAgent')->id])->first();
        if(is_null($data)){
            abort(404);
        }
        $social_links = DB::table('tbl_booking_cl_social_link')->where('calender_id', $data->id)->get();
        // dd($data);
        return view('front.appointment-thankyou', compact('data','social_links'));
    }
   


}