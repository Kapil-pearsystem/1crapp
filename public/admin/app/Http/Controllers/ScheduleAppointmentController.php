<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleAppointmentModel;
use Illuminate\Support\Facades\DB;

class ScheduleAppointmentController extends Controller
{
    //  List
    public function index()
    {
        $lists = ScheduleAppointmentModel::where('created_by', auth()->id())->get();
        $calenders = DB::table('tbl_appointment_booking')->pluck('title', 'id');
        return view('schedule-appointment.index', compact('lists', 'calenders'));
    }
    //  Create Page
    public function create()
    {
        $calenders = DB::table('tbl_calender')->where('created_by', auth()->id())->pluck('title', 'id');
        $contacts = DB::table('tbl_contact')->where('created_by', auth()->id())->where('status',1)->pluck('name','id');
        $tags = DB::table('tbl_tags')->where('created_by', auth()->id())->where('status',1)->pluck('name','id');
        return view('schedule-appointment.create', compact('calenders','tags','contacts'));
    }
    //  Store / Update
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
        'title'           => 'required|string|max:255',
        'schedule_date'   => 'required|date',
        'schedule_hour'   => 'required',
        'schedule_minute' => 'required',
        'schedule_am_pm'  => 'required',
        ]);
        // Add / Update
        if ($request->id) {
            $record = ScheduleAppointmentModel::findOrFail($request->id);
            $message = "Appointment updated successfully!";
        } else {
            $record = new ScheduleAppointmentModel();
            $message = "Appointment created successfully!";
        }
        // Basic Fields
        $record->title = $request->title;
        $record->schedule_date = $request->schedule_date;
        $record->schedule_hour   = $request->schedule_hour;
        $record->schedule_minute = $request->schedule_minute;
        $record->schedule_am_pm  = $request->schedule_am_pm;
        $record->duration = $request->duration;
        $record->calendar_product_id = $request->calender_id;
        $record->location_url = $request->meeting_url;
        $record->meeting_source = $request->meeting_source;
        $record->contact_list_id = $request->contacts_list 
        ? implode(',', $request->contacts_list) 
        : null;
        $record->tags = $request->tags ? json_encode($request->tags) : null;
        $record->excluded_tags = $request->excluded_tags ? json_encode(explode(',', $request->excluded_tags)) : null;
        $record->remarks = $request->remarks;
        if ($request->has('remind_me')) {
            $record->remind_me = 1;
            $record->remind_me_via = $request->remind_me_via;
            $record->remind_me_at = $request->remind_me_at;
            $record->remind_me_message = $request->remind_me_message;
        } else {
            $record->remind_me = 0;
            $record->remind_me_via = null;
            $record->remind_me_at = null;
            $record->remind_me_message = null;
        }
        if ($request->has('remind_customer')) {
            $record->remind_customer = 1;
            $record->remind_customer_via = $request->remind_customer_via;
            $record->remind_customer_at = $request->remind_customer_at;
            $record->remind_customer_message = $request->remind_customer_message;
        } else {
            $record->remind_customer = 0;
            $record->remind_customer_via = null;
            $record->remind_customer_at = null;
            $record->remind_customer_message = null;
        }
        $record->status = $request->status ?? 1;
        $record->created_by = auth()->id();
        // dd($record);
        $record->save();
        return redirect()->route('appointments.index')->with('success', $message);
    }
    //  Edit
    public function edit($id)
    {
        $details = ScheduleAppointmentModel::findOrFail($id);
        $details->tags = $details->tags ? json_decode($details->tags, true) : [];
        $details->excluded_tags = $details->excluded_tags ? json_decode($details->excluded_tags, true) : [];
        $calenders = DB::table('tbl_appointment_booking')->pluck('title', 'id');
        $tags = DB::table('tbl_tags')->where('status',1)->pluck('name','id');
        $contacts = DB::table('tbl_contact')->where('status',1)->pluck('name','id');
        return view('schedule-appointment.create', compact('details','calenders','tags','contacts'));
    }
    //  Delete
    public function destroy($id)
    {
        $record = ScheduleAppointmentModel::findOrFail($id);
        $record->delete();
        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}