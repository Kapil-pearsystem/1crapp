<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentBookingModel;
use Illuminate\Support\Str;

class AppointmentBookingController extends Controller
{
    // ⭐ LIST
    public function index()
    {
        $lists = AppointmentBookingModel::where('created_by', auth()->id())->get();
        return view('appointment-booking.index', compact('lists'));
    }

    // ⭐ CREATE
    public function create()
    {
        return view('appointment-booking.create');
    }

    // ⭐ STORE + UPDATE
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        // ⭐ ADD / UPDATE
        if ($request->id) {
            $record = AppointmentBookingModel::findOrFail($request->id);
            $message = "Record updated successfully!";
        } else {
            $record = new AppointmentBookingModel();
            $message = "Record created successfully!";
        }

        // ✅ Page Name
        $record->page_name = $request->page_name;

        // ✅ SLUG AUTO GENERATE + UNIQUE
        $baseSlug = Str::slug($request->page_name);
        $slug = $baseSlug;
        $count = 1;

        while (
            AppointmentBookingModel::where('slug', $slug)
                ->when($request->id, function ($q) use ($request) {
                    return $q->where('id', '!=', $request->id);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $count++;
        }

        $record->slug = $slug;

        // ⭐ SAVE DATA
        $record->title = $request->title;
        $record->subtitle = $request->subtitle;
        $record->sort_description = $request->sort_description;

        $record->step_title = $request->step_title;

        $record->left_title1 = $request->left_title1;
        $record->left_description1 = $request->left_description1;

        $record->left_title2 = $request->left_title2;
        $record->left_description2 = $request->left_description2;

        $record->left_title3 = $request->left_title3;
        $record->left_description3 = $request->left_description3;

        $record->embed_title = $request->embed_title;
        $record->embed_code = $request->embed_code;

        $record->testimonial_title = $request->testimonial_title;

        $record->test_visible = $request->test_visible ?? 0;
        $record->test_title_visible = $request->test_title_visible ?? 0;

        $record->status = $request->status ?? 1;
        $record->created_by = auth()->id();

        $record->save();

        return redirect()->route('appointment-booking.index')->with('success', $message);
    }

    // ⭐ EDIT
    public function edit($id)
    {
        $details = AppointmentBookingModel::findOrFail($id);
        return view('appointment-booking.create', compact('details'));
    }

    // ⭐ DELETE
    public function destroy($id)
    {
        $record = AppointmentBookingModel::findOrFail($id);
        $record->delete();

        return redirect()->route('appointment-booking.index')
            ->with('success', 'Record deleted successfully.');
    }
}