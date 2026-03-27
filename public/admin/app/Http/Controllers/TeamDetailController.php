<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamDetailModel;
use App\Models\MeetCategoryModel;
use Illuminate\Support\Facades\File;

class TeamDetailController extends Controller
{
    // Show listing
    public function index()
    {
        $lists = TeamDetailModel::with('category')->orderBy('id', 'DESC')->get();
        return view('team-detail.index', compact('lists'));
    }

    // Show create form
    public function create()
    {
        $categories = MeetCategoryModel::where('status', 1)->get();
        return view('team-detail.create', compact('categories'));
    }

    // Add / Edit
    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required|exists:tbl_meet_category,id',
            'name'          => 'required|string|max:150',
            'designation'   => 'required|string|max:150',
            'description'   => 'nullable|string',
            'button_title'  => 'nullable|string|max:100',
            'button_link'   => 'nullable|url|max:255',
            'image'         => $request->id
                                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                                : 'required|image|mimes:jpg,jpeg,png|max:2048',
            'facebook'      => 'nullable|url|max:255',
            'instagram'     => 'nullable|url|max:255',
            'youtube'       => 'nullable|url|max:255',
            'linkedin'      => 'nullable|url|max:255',
            'twitter'       => 'nullable|url|max:255',
            'whatsapp'      => 'nullable|string|max:50',
            'google'        => 'nullable|url|max:255',
            'status'        => 'required|in:0,1',
        ]);

        // Handle image upload
if ($request->hasFile('image')) {
    $imageName = time() . '_' . $request->image->getClientOriginalName();
    $request->image->move(public_path('uploads/team_detail/'), $imageName);

    // Full URL of the uploaded image
    $imagePath = url('uploads/team_detail/' . $imageName);

    // Delete old image if updating
    if ($request->id) {
        $old = TeamDetailModel::find($request->id);
        if ($old && File::exists(public_path(parse_url($old->image, PHP_URL_PATH)))) {
            File::delete(public_path(parse_url($old->image, PHP_URL_PATH)));
        }
    }
} else {
    // Use old image full URL
    $imagePath = $request->old_image ?? null;
}


        // Add or Edit
        if ($request->id) {
            $record = TeamDetailModel::findOrFail($request->id);
            $message = "Team member updated successfully!";
        } else {
            $record = new TeamDetailModel();
            $message = "Team member added successfully!";
        }

        // Assign values
        $record->category_id    = $request->category_id;
        $record->name           = $request->name;
        $record->designation    = $request->designation;
        $record->description    = $request->description;
        $record->button_title   = $request->button_title;
        $record->button_link    = $request->button_link;
        $record->image          = $imagePath;
        $record->facebook       = $request->facebook;
        $record->instagram      = $request->instagram;
        $record->youtube        = $request->youtube;
        $record->linkedin       = $request->linkedin;
        $record->twitter        = $request->twitter;
        $record->whatsapp       = $request->whatsapp;
        $record->google         = $request->google;
        $record->status         = $request->status;
        $record->created_by     = auth()->id();
        $record->save();

        return redirect()->route('team-detail.index')->with('success', $message);
    }

    // Edit page
    public function edit($id)
    {
        $details = TeamDetailModel::findOrFail($id);
        $categories = MeetCategoryModel::where('status', 1)->get();
        return view('team-detail.create', compact('details', 'categories'));
    }

    // Delete record
    public function destroy($id)
    {
        $record = TeamDetailModel::findOrFail($id);

        if ($record->image && File::exists(public_path($record->image))) {
            File::delete(public_path($record->image));
        }

        $record->delete();

        return redirect()->route('team-detail.index')->with('success', 'Team member deleted successfully.');
    }
}
