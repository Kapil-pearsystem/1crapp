<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentBookingHomeworkModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppointmentBookingHomeworkController extends Controller
{
    // ⭐ List
    public function index()
    {
        $lists = AppointmentBookingHomeworkModel::select('tbl_appointment_booking_homework.*', 'tbl_form.form_name')
        ->leftjoin('tbl_form', 'tbl_form.id', '=', 'tbl_appointment_booking_homework.form_id')
        ->where('tbl_appointment_booking_homework.created_by', auth()->id())->get();
        return view('appointment-homework.index', compact('lists'));
    }

    // ⭐ Create
    public function create()
    {
         $fileDrives = DB::table('tbl_filedrive')
        ->where('status', 1)
        ->pluck('title', 'id');

    $forms = DB::table('tbl_form')
        ->where('status', 1)
        ->pluck('form_name', 'id');
        return view('appointment-homework.create', compact('fileDrives', 'forms'));
    }

    // ⭐ Store + Update
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
           'media_path' => 'nullable|mimes:jpg,jpeg,png,mp4,avi,mov,webm|max:20480'
        ]);

        // ⭐ Add / Update
        if ($request->id) {
            $record = AppointmentBookingHomeworkModel::findOrFail($request->id);
            $message = "Homework updated successfully!";
        } else {
            $record = new AppointmentBookingHomeworkModel();
            $message = "Homework created successfully!";
        }

        // ✅ Page Name
        $record->page_name = $request->page_name ?? $request->title;

        // ✅ Slug (AUTO UNIQUE)
        $baseSlug = Str::slug($record->page_name);
        $slug = $baseSlug;
        $count = 1;

        while (
            AppointmentBookingHomeworkModel::where('slug', $slug)
                ->when($request->id, function ($q) use ($request) {
                    return $q->where('id', '!=', $request->id);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $count++;
        }

        $record->slug = $slug;

        // ⭐ Media Upload
        // ⭐ Media Upload / Embed Handling
if ($request->media_type === 'embed_code') {

    // 👉 URL wala media_path me save hoga
    $mediaPath = $request->embed_url;

} else {

    if ($request->hasFile('media_path')) {

        $fileName = time().'_'.$request->file('media_path')->getClientOriginalName();
        $request->file('media_path')->move(public_path('uploads/homework/'), $fileName);

        $mediaPath = url('uploads/homework/'.$fileName);

        // delete old file
        if ($request->id && $record->media_path) {
            $oldFile = public_path(str_replace(url('/').'/', '', $record->media_path));
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }
        }

    } else {
        $mediaPath = $request->old_media ?? $record->media_path ?? null;
    }
}

        // ⭐ Save Data
        $record->title = $request->title;
        $record->sub_title = $request->sub_title;

        $record->media_type = $request->media_type ?? 'image';
        $record->media_path = $mediaPath;
        $record->media_visible = $request->media_visible ?? 1;

        $record->sort_description = $request->sort_description;

        $record->embed_code = $request->embed_code;
        $record->ec_visible = $request->ec_visible ?? 0;

        $record->file_drive_id = $request->file_drive_id;
        $record->fd_visible = $request->fd_visible ?? 0;

        $record->form_id = $request->form_id;
        $record->form_visible = $request->form_visible ?? 0;

        $record->typ_cta_text = $request->typ_cta_text;
        $record->typ_visible = $request->typ_visible ?? 0;

        $record->status = $request->status ?? 1;
        $record->created_by = auth()->id();

        $record->save();

        return redirect()->route('appointment-homework.index')->with('success', $message);
    }

    // ⭐ Edit
    public function edit($id)
    {
         $fileDrives = DB::table('tbl_filedrive')
        ->where('status', 1)
        ->pluck('title', 'id');

    $forms = DB::table('tbl_form')
        ->where('status', 1)
        ->pluck('form_name', 'id');
        $details = AppointmentBookingHomeworkModel::findOrFail($id);
        return view('appointment-homework.create', compact('details', 'fileDrives', 'forms'));
    }

    // ⭐ Delete
    public function destroy($id)
    {
        $record = AppointmentBookingHomeworkModel::findOrFail($id);

        // delete media file
        if ($record->media_path) {
            $filePath = public_path(str_replace(url('/').'/', '', $record->media_path));
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $record->delete();

        return redirect()->route('appointment-homework.index')
            ->with('success', 'Homework deleted successfully.');
    }
    public function updateFdStatus($id, $status)
    {
        $validate = Validator::make([
            'user_id'   => $id,
            'status'    => $status
        ], [
            'user_id'   =>  'required|exists:tbl_appointment_booking_homework,id',
            'status'    =>  'required|in:0,1',
        ]);
        // If Validations Fails
        if($validate->fails()){
            return 0;
        }
        try {
            DB::beginTransaction();
            // Update Status with reason
            AppointmentBookingHomeworkModel::whereId($id)->update(['fd_visible' => $status]);
            // Commit And Redirect on index with Success Message
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}