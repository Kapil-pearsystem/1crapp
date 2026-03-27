<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingEventModel;
use Illuminate\Support\Facades\File;

class BookingEventController extends Controller
{
    // ⭐ Show list
    public function index()
    {
        $lists = BookingEventModel::where('created_by', auth()->id())->get();
        return view('booking-event.index', compact('lists'));
    }

    // ⭐ Show create form
    public function create()
    {
        return view('booking-event.create');
    }

    // ⭐ Add + Edit
    public function store(Request $request)
    {
        $request->validate([
            'step'        => 'required|integer',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_link'  => 'nullable|url',

            // Image validation (Add vs Update)
            'image' => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ⭐ Handle image upload
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/booking_event/'), $fileName);

            // Save full URL
            $imagePath = url('uploads/booking_event/' . $fileName);

            // Delete old image (on update)
            if ($request->id) {
                $old = BookingEventModel::find($request->id);
                if ($old && $old->image) {
                    $oldFile = public_path(str_replace(url('/') . '/', '', $old->image));
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
            }
        } else {
            $imagePath = $request->old_image ?? null;
        }

        // ⭐ Add or Edit
        if ($request->id) {
            $record  = BookingEventModel::findOrFail($request->id);
            $message = "Booking event updated successfully!";
        } else {
            $record  = new BookingEventModel();
            $message = "Booking event created successfully!";
        }

        // ⭐ Assign values
        $record->step        = $request->step;
        $record->title       = $request->title;
        $record->description = $request->description;
        $record->video_link  = $request->video_link;
        $record->status      = $request->status ?? 1;
        $record->image       = $imagePath;
        $record->created_by  = auth()->id();

        $record->save();

        return redirect()->route('booking-event.index')->with('success', $message);
    }

    // ⭐ Edit page
    public function edit($id)
    {
        $details = BookingEventModel::findOrFail($id);
        return view('booking-event.create', compact('details'));
    }

    // ⭐ Delete
    public function destroy($id)
    {
        $record = BookingEventModel::findOrFail($id);

        // Delete image
        if ($record->image) {
            $filePath = public_path(str_replace(url('/') . '/', '', $record->image));
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $record->delete();

        return redirect()->route('booking-event.index')
            ->with('success', 'Booking event deleted successfully.');
    }
}
