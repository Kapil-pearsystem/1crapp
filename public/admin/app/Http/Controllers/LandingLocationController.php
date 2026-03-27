<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingLocationModel;
use Illuminate\Support\Facades\File;

class LandingLocationController extends Controller
{
    // List all locations created by logged-in user
    public function index()
    {
        $locations = LandingLocationModel::where('created_by', auth()->id())->get();
        return view('landing-location.index', compact('locations'));
    }

    // Show create form
    public function create()
    {
        return view('landing-location.create');
    }

    // Store or Update
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'status'      => 'required|in:0,1',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/landing_location/'), $imageName);

            $imagePath = url('uploads/landing_location/' . $imageName);

            // Delete old image if updating
            if ($request->id) {
                $oldRecord = LandingLocationModel::find($request->id);
                if ($oldRecord && $oldRecord->image) {
                    $oldImagePath = public_path(str_replace(url('/'), '', $oldRecord->image));
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
            }
        } else {
            $imagePath = $request->old_image ?? null;
        }

        // Determine add or update
        if ($request->id) {
            $location = LandingLocationModel::findOrFail($request->id);
            $message = "Location updated successfully!";
        } else {
            $location = new LandingLocationModel();
            $message = "Location created successfully!";
        }

        // Assign values
        $location->title = $request->title;
        $location->image = $imagePath;
        $location->description = $request->description;
        $location->status = $request->status;
        $location->created_by = auth()->id();
        $location->save();

        return redirect()->route('landing-location.index')->with('success', $message);
    }

    // Edit form
    public function edit($id)
    {
        $details = LandingLocationModel::findOrFail($id);
        return view('landing-location.create', compact('details'));
    }

    // Delete location
    public function destroy($id)
    {
        $location = LandingLocationModel::findOrFail($id);

        // Delete image file if exists
        if ($location->image) {
            $imagePath = public_path(str_replace(url('/'), '', $location->image));
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $location->delete();

        return redirect()->route('landing-location.index')->with('success', 'Location deleted successfully.');
    }
}
