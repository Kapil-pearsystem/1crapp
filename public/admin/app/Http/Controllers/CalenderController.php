<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalenderModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CalenderController extends Controller
{
    // ⭐ List
    public function index()
    {
        $lists = CalenderModel::select('tbl_calender.*', 'tbl_page.slug as page_path')
        ->where('tbl_calender.created_by', auth()->id())
        ->join('tbl_page', 'tbl_page.id', '=', 'tbl_calender.select_lp_id')
        ->get();

        $pages = DB::table('tbl_page')->pluck('page_name', 'id');
        $appointmentbooking = DB::table('tbl_appointment_booking')->pluck('page_name', 'id'); 
        $appointmenthomework = DB::table('tbl_appointment_booking_homework')->pluck('page_name', 'id'); 
        $thankyou = DB::table('tbl_appointment_thankyou')->pluck('page_name', 'id'); 
        // dd($thankyou);
        return view('calender.index', compact(
            'lists',
            'pages',
            'appointmentbooking',
            'appointmenthomework',
            'thankyou'
        ));
    }

    // ⭐ Create Page
    public function create()
    {
        $pages = DB::table('tbl_page')->where('created_by', auth()->id())->pluck('page_name', 'id');
        $appointmentbooking = DB::table('tbl_appointment_booking')->where('created_by', auth()->id())->pluck('page_name', 'id'); 
        $appointmenthomework = DB::table('tbl_appointment_booking_homework')->where('created_by', auth()->id())->pluck('page_name', 'id'); 
        $thankyou = DB::table('tbl_appointment_thankyou')->where('created_by', auth()->id())->pluck('page_name', 'id');
        return view('calender.create', compact('pages', 'appointmentbooking', 'appointmenthomework', 'thankyou'));
    }

    // ⭐ Add + Edit
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string|max:255',
            'titl'      => 'nullable|string|max:255',
        ]);

        // ⭐ Add / Update
        if ($request->id) {
            $record = CalenderModel::findOrFail($request->id);
            $message = "Calender updated successfully!";
        } else {
            $record = new CalenderModel();
            $message = "Calender created successfully!";
        }

        // ⭐ Page Name
        $record->page_name = $request->page_name;

        // ⭐ Slug generate (unique)
        $baseSlug = Str::slug($request->page_name);
        $slug = $baseSlug;
        $count = 1;

        while (
            CalenderModel::where('slug', $slug)
            ->when($request->id, function ($q) use ($request) {
                return $q->where('id', '!=', $request->id);
            })
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $count++;
        }

        $record->slug = $slug;

        // ⭐ Other Fields
        $record->title = $request->title;
        $record->select_lp_id = $request->select_lp_id;
        $record->aa_page_id = $request->aa_page_id;
        $record->select_booking_page_id = $request->select_booking_page_id;
        $record->homework_page_id = $request->homework_page_id;
        $record->thank_you_id = $request->thank_you_id;

        $record->status = $request->status ?? 1;
        $record->created_by = auth()->id();

        $record->save();

        return redirect()->route('calender.index')->with('success', $message);
    }

    // ⭐ Edit
    public function edit($id)
    {
        $details = CalenderModel::findOrFail($id);
        $pages = DB::table('tbl_page')->pluck('page_name', 'id'); 
        $appointmentbooking = DB::table('tbl_appointment_booking')->pluck('page_name', 'id'); 
        $appointmenthomework = DB::table('tbl_appointment_booking_homework')->pluck('page_name', 'id'); 
        $thankyou = DB::table('tbl_appointment_thankyou')->pluck('page_name', 'id'); 

        return view('calender.create', compact('details', 'pages', 'appointmentbooking', 'appointmenthomework', 'thankyou'));
    }

    // ⭐ Delete
    public function destroy($id)
    {
        $record = CalenderModel::findOrFail($id);
        $record->delete();

        return redirect()->route('calender.index')
            ->with('success', 'Calender deleted successfully.');
    }
}