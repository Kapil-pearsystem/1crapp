<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaModel;

class MediaController extends Controller
{
    // ⭐ LIST PAGE
    public function index()
    {
        $lists = MediaModel::where('created_by', auth()->id())
                            ->orderBy('id', 'DESC')
                            ->get();

        return view('media.index', compact('lists'));
    }

    // ⭐ CREATE FORM
    public function create()
    {
        return view('media.create');
    }

    // ⭐ STORE + UPDATE
   public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'nullable|string',
            'date'              => 'nullable|date',
            'status'            => 'required|in:0,1',
            
        ]);

        // If ID exists → Update, otherwise Create
        if ($request->id) {
            $record  = MediaModel::findOrFail($request->id);
            $message = "Media updated successfully!";
        } else {
            $record  = new MediaModel();
            $message = "Media created successfully!";
        }

        // SET DATA
        $record->title             = $request->title;
        $record->short_description = $request->short_description;
        $record->description       = $request->description;
        $record->date              = $request->date;
        $record->status            = $request->status;
        $record->created_by        = auth()->id();

        // ⭐ IMAGE UPLOAD
        if ($request->hasFile('image')) {

            // delete old image if exists
            if (!empty($record->image)) {
                $oldFile = public_path(parse_url($record->image, PHP_URL_PATH));
                if (file_exists($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $file      = $request->file('image');
            $filename  = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filepath  = 'uploads/media/' . $filename;

            // Move file to public/uploads/media folder
            $file->move(public_path('uploads/media'), $filename);

            // ⭐ FULL URL SAVE
            $record->image = url($filepath);
        }

        // Save Data
        $record->save();

        return redirect()->route('media.index')->with('success', $message);
    }


    // ⭐ EDIT FORM
    public function edit($id)
    {
        $details = MediaModel::findOrFail($id);
        return view('media.create', compact('details'));
    }

    // ⭐ DELETE
    public function destroy($id)
    {
        $record = MediaModel::findOrFail($id);
        $record->delete();

        return redirect()->route('media.index')
                         ->with('success', 'Media deleted successfully.');
    }
}
