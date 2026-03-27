<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkMatrixModel;
use Illuminate\Support\Facades\File;

class WorkMatrixController extends Controller
{
    // Show all records
    public function index()
    {
        $lists = WorkMatrixModel::where('created_by', auth()->user()->id)->get();
        return view('work-matrix.index', compact('lists'));
    }

    // Show create form
    public function create()
    {
        return view('work-matrix.create');
    }

    // Store or update record
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
            'priority' => 'required|integer|min:0',
            'status' => 'required|in:0,1',
        ]);

        // Handle image
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/'), $imageName);
            $imagePath = 'uploads/' . $imageName;

            // Delete old image
            if ($request->id) {
                $old = WorkMatrixModel::find($request->id);
                if ($old && File::exists(public_path($old->image))) {
                    File::delete(public_path($old->image));
                }
            }
        } else {
            $imagePath = $request->old_image ?? null;
        }

        if ($request->id) {
            $record = WorkMatrixModel::find($request->id);
            $message = 'Record updated successfully';
        } else {
            $record = new WorkMatrixModel();
            $message = 'Record created successfully';
        }

        $record->title = $request->title;
        $record->description = $request->description;
        $record->image = $imagePath;
        $record->priority = $request->priority;
        $record->status = $request->status;
        $record->created_by = auth()->id();

        $record->save();

        return redirect()->route('work-matrix.index')->with('success', $message);
    }

    // Edit record
    public function edit($id)
    {
        $details = WorkMatrixModel::findOrFail($id);
        return view('work-matrix.create', compact('details'));
    }

    // Delete record
    public function destroy($id)
    {
        $record = WorkMatrixModel::findOrFail($id);

        if ($record->image && File::exists(public_path($record->image))) {
            File::delete(public_path($record->image));
        }

        $record->delete();

        return redirect()->route('work-matrix.index')->with('success', 'Record deleted successfully.');
    }
}
