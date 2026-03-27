<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalltoActionModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CalltoActionController extends Controller
{
    // Show all records
    public function index()
    {
        $data = CalltoActionModel::orderBy('id', 'desc')->get();
        return view('call-to-action.index', compact('data'));
    }

    // Show form to create or edit
    public function create()
    {
        return view('call-to-action.create');
    }

    // Store or update record
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'section' => 'required|numeric|between:1,9',
            'status'        => 'required|in:0,1',
            'image'         => $request->id ? 'nullable|image|mimes:jpg,jpeg,png' : 'required|image|mimes:jpg,jpeg,png',
            'left_link_url'  => 'nullable|url|max:500',
            'right_link_url' => 'nullable|url|max:500',
        ]);

        $data = $request->only([
            'title',
            'description',
            'left_link_title',
            'left_link_new_tab',
            'right_link_title',
            'right_link_new_tab',
            'left_link_url',
            'right_link_url',
            'section',
            'status'
        ]);

        $data['left_link_new_tab'] = $request->has('left_link_new_tab') ? 1 : 0;
        $data['right_link_new_tab'] = $request->has('right_link_new_tab') ? 1 : 0;

        // Upload image
        if ($request->hasFile('image')) {
            $imagePath = 'uploads/call-to-action/';
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path($imagePath), $imageName);
            $data['image'] = $imagePath . $imageName;

            // Delete old image if exists
            if ($request->filled('old_image')) {
                $oldImage = base64_decode($request->old_image);
                if (File::exists(public_path($oldImage))) {
                    File::delete(public_path($oldImage));
                }
            }
        }

        if ($request->filled('id')) {
            $record = CalltoActionModel::findOrFail($request->id);
            $record->update($data);
            return redirect()->route('call-to-action.index')->with('success', 'Call to Action updated successfully.');
        } else {
            $data['created_by'] = Auth::id();
            CalltoActionModel::create($data);
            return redirect()->route('call-to-action.index')->with('success', 'Call to Action created successfully.');
        }
    }
    public function edit($id)
    {
    $details = CalltoActionModel::findOrFail($id);
    return view('call-to-action.create', compact('details'));
    }

    // Delete a record
    public function delete($id)
    {
        $record = CalltoActionModel::findOrFail($id);

        // Delete associated image
        if ($record->image && File::exists(public_path($record->image))) {
            File::delete(public_path($record->image));
        }

        $record->delete();

        return redirect()->back()->with('success', 'Call to Action deleted successfully.');
    }
}
