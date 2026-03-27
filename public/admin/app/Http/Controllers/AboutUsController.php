<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUsModel;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    // Show list
    public function index()
    {
        $lists = AboutUsModel::where('created_by', auth()->id())->get();
        return view('about.index', compact('lists'));
    }

    // Show create form
    public function create()
    {
        return view('about.create');
    }

    // ADD + EDIT both here
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required|string',
            'leadership'        => 'nullable|string|max:255',
            'name'              => 'nullable|string|max:255',
            'designation'       => 'nullable|string|max:255',
            // 'meta_title'        => 'nullable|string|max:255',
            // 'meta_keyword'      => 'nullable|string',
            // 'meta_description'  => 'nullable|string',
            'status'            => 'required|in:0,1',

            // If editing → optional | If adding → required
            'leadership_image' => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ⭐ Handle image upload
if ($request->hasFile('leadership_image')) {

    $imageName = time() . '_' . $request->leadership_image->getClientOriginalName();
    $request->leadership_image->move(public_path('uploads/about_us/'), $imageName);

    // Save full URL instead of relative path
    $imagePath = url('uploads/about_us/' . $imageName);

    // Delete old image if update
    if ($request->id) {
        $old = AboutUsModel::find($request->id);
        if ($old && $old->leadership_image) {
            // Extract the relative path from old URL to delete
            $oldPath = public_path(str_replace(url('/'), '', $old->leadership_image));
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }
    }
} else {
    $imagePath = $request->old_image ?? null;
}


        // ⭐ Determine Add or Edit
        if ($request->id) {
            $record = AboutUsModel::findOrFail($request->id);
            $message = "About Us updated successfully!";
        } else {
            $record = new AboutUsModel();
            $message = "About Us created successfully!";
        }

        // ⭐ Assign values
        $record->title = $request->title;
        $record->description = $request->description;
        $record->leadership = $request->leadership;
        $record->leadership_image = $imagePath;
        $record->name = $request->name;
        $record->designation = $request->designation;
        $record->footer_content   = $request->footer_content;
        // $record->meta_title = $request->meta_title;
        // $record->meta_keyword = $request->meta_keyword;
        // $record->meta_description = $request->meta_description;
        $record->status = $request->status;
        $record->created_by = auth()->id();

        $record->save();

        return redirect()->route('about-us.index')->with('success', $message);
    }

    // Edit page
    public function edit($id)
    {
        $details = AboutUsModel::findOrFail($id);
        return view('about.create', compact('details'));
    }

    // Delete record
    public function destroy($id)
    {
        $record = AboutUsModel::findOrFail($id);

        if ($record->leadership_image && File::exists(public_path($record->leadership_image))) {
            File::delete(public_path($record->leadership_image));
        }

        $record->delete();

        return redirect()->route('about-us.index')
            ->with('success', 'About Us deleted successfully.');
    }
}
