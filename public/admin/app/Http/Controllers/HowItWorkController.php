<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HowItWork; // make sure you have a model
use App\Models\HowItWorkModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HowItWorkController extends Controller
{
    public function index()
    {
        $lists = HowItWorkModel::all();
        return view('how-it-works.index', compact('lists'));
    }

    public function create()
    {
        return view('how-it-works.create');
    }

    public function edit($id)
    {
        $details = HowItWorkModel::findOrFail($id);
        return view('how-it-works.create', compact('details'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:100',
            'section_side' => 'required|in:left,right',
            'step' => 'required|integer|min:1|max:6',
            'title' => 'required|string|max:255',
            'priority' => 'required|integer|min:0',
            'status' => 'required|in:0,1',
            'images.*' => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePaths = [];

        // Upload new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/how-it-works/'), $imageName);
                $imagePaths[] = 'uploads/how-it-works/' . $imageName;
            }
        }

        // Include existing images if any
        if ($request->has('existing_images')) {
            foreach ($request->existing_images as $existingImage) {
                $imagePaths[] = $existingImage;
            }
        }

        // If editing existing record
        if ($request->id) {
            $record = HowItWorkModel::find($request->id);
            $message = 'Record updated successfully';

            // Optional: Delete removed images
            $existingImages = explode(',', $record->images ?? '');
            foreach ($existingImages as $oldImage) {
                if (!in_array($oldImage, $imagePaths) && File::exists(public_path($oldImage))) {
                    File::delete(public_path($oldImage));
                }
            }
        } else {
            $record = new HowItWorkModel();
            $message = 'Record created successfully';
        }

        $record->category = $request->category;
        $record->section_side = $request->section_side;
        $record->step = $request->step;
        $record->title = $request->title;
        $record->description = $request->description;
        $record->priority = $request->priority;
        $record->btn_link_new_tab = $request->btn_link_new_tab;
        $record->btn_link = $request->btn_link;
        $record->status = $request->status;
        $record->images = implode(',', $imagePaths); // <-- comma-separated
        $record->created_by = auth()->id();
        $record->save();

        return redirect()->route('how-it-works.index')->with('success', $message);
    }


    public function destroy($id)
    {
        $item = HowItWorkModel::findOrFail($id);

        // Delete associated images
        if ($item->images) {
            $images = explode(',', $item->images);
            foreach ($images as $imgPath) {
                if (File::exists(public_path($imgPath))) {
                    File::delete(public_path($imgPath));
                }
            }
        }

        $item->delete();

        return redirect()->route('how-it-works.index')->with('success', 'Record deleted successfully!');
    }
}
