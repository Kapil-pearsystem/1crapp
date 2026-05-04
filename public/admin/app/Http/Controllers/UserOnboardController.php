<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginCmsModel;
use App\Models\SignupCmsModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserOnboardController extends Controller
{
    public function signup()
    {
        $details = SignupCmsModel::where('created_by', auth()->id())->first();
        return view('useronboard.signupcms', compact('details'));
    }
    public function signup_save(Request $request)
    {
        $request->validate([
            'tagline_text' => 'nullable|string|max:255',
            'file_type' => 'nullable|string|max:50',
            'status' => 'required|in:0,1',
        ]);

        // Find or create
        if ($request->id) {
            $record = SignupCmsModel::findOrFail($request->id);
            $message = 'Signup CMS updated successfully';

            // Delete old file if new uploaded
            if ($request->hasFile('file_path') && !empty($record->file_path)) {
                if (File::exists(public_path($record->file_path))) {
                    File::delete(public_path($record->file_path));
                }
            }
        } else {
            $record = new SignupCmsModel();
            $message = 'Signup CMS created successfully';
        }

        // Upload file
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/'), $fileName);
            $record->file_path = asset('uploads/' . $fileName);
        }
        if (!$request->hasFile('file_path') && $request->filled('media_link')) {
            $record->file_path = $request->media_link; // Retain old file path if no new file uploaded
        }

        // Assign fields
        $record->logo_visible = $request->has('logo_visible') ? 1 : 0;
        $record->tagline_text = $request->tagline_text;
        $record->tagline_visible = $request->has('tagline_visible') ? 1 : 0;

        $record->file_type = $request->file_type;
        $record->file_visible = $request->has('file_visible') ? 1 : 0;

        $record->b1_icon = $request->b1_icon;
        $record->b1_text = $request->b1_text;

        $record->b2_icon = $request->b2_icon;
        $record->b2_text = $request->b2_text;

        $record->b3_icon = $request->b3_icon;
        $record->b3_text = $request->b3_text;

        $record->b4_icon = $request->b4_icon;
        $record->b4_text = $request->b4_text;

        $record->bullet_visible = $request->has('bullet_visible') ? 1 : 0;

        $record->status = $request->status;
        $record->created_by = auth()->id();

        $record->save();

        return redirect()->back()->with('success', $message);
    }
    public function login()
    {
        $details = LoginCmsModel::where('created_by', auth()->id())->first();
        return view('useronboard.logincms', compact('details'));
    }
    public function login_save(Request $request)
    {
        $request->validate([
            'tagline_text' => 'nullable|string|max:255',
            'file_type' => 'nullable|string|max:50',
            'status' => 'required|in:0,1',
        ]);

        // Find or create
        if ($request->id) {
            $record = LoginCmsModel::findOrFail($request->id);
            $message = 'Login CMS updated successfully';

            // Delete old file if new uploaded
            if ($request->hasFile('file_path') && !empty($record->file_path)) {
                if (File::exists(public_path($record->file_path))) {
                    File::delete(public_path($record->file_path));
                }
            }
        } else {
            $record = new LoginCmsModel();
            $message = 'Login CMS created successfully';
        }
        // Upload file
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/'), $fileName);
            $record->file_path = asset('uploads/' . $fileName);
        }
        if (!$request->hasFile('file_path') && $request->filled('media_link')) {
            $record->file_path = $request->media_link; // Retain old file path if no new file uploaded
        }
        if ($request->hasFile('gotit_image')) {
            $file = $request->file('gotit_image');
            $fileName1 = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/'), $fileName1);
            $record->gotit_image = asset('uploads/' . $fileName1);
        }
        // Assign fields
        $record->logo_visible = $request->has('logo_visible') ? 1 : 0;
        $record->tagline_text = $request->tagline_text;
        $record->tagline_visible = $request->has('tagline_visible') ? 1 : 0;

        $record->file_type = $request->file_type;
        $record->file_visible = $request->has('file_visible') ? 1 : 0;
        $record->content = $request->content;
        $record->content_visible = $request->has('content_visible') ? 1 : 0;
        $record->gotit_link = $request->gotit_link;
        $record->gotit_visible = $request->has('gotit_visible') ? 1 : 0;
        $record->status = $request->status;
        $record->created_by = auth()->id();
        $record->save();
        return redirect()->back()->with('success', $message);
    }
}
