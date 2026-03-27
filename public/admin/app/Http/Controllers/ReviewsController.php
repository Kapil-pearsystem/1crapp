<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewsModel;
use Illuminate\Support\Facades\File;

class ReviewsController extends Controller
{
    // ⭐ Show list
  public function index() 
  { $lists = ReviewsModel::where('created_by', auth()->id())->get(); 
    return view('reviews.index', compact('lists')); 
  }


    // ⭐ Show create form
    public function create()
    {
        return view('reviews.create');
    }

    // ⭐ Add + Edit
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',

            'review_text' => 'required|string',

            // Image check (Add vs Update)
            'image' => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ⭐ Handle image upload
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/reviews/'), $fileName);

            // Save full URL
            $imagePath = url('uploads/reviews/' . $fileName);

            // Delete old image if update
            if ($request->id) {
                $old = ReviewsModel::find($request->id);
                if ($old && $old->image) {

                    // Convert old full URL → actual file path
                    $oldFile = public_path(str_replace(url('/').'/', '', $old->image));

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
            $record = ReviewsModel::findOrFail($request->id);
            $message = "Review updated successfully!";
        } else {
            $record = new ReviewsModel();
            $message = "Review created successfully!";
        }

        // ⭐ Assign values
        $record->name        = $request->name;
        $record->rating      = $request->rating;
        $record->review_text = $request->review_text;
        $status = $request->status ?? 1;
        $record->image       = $imagePath;
        $record->created_by  = auth()->id();

        $record->save();

        return redirect()->route('reviews.index')->with('success', $message);
    }

    // ⭐ Edit Page
    public function edit($id)
    {
        $details = ReviewsModel::findOrFail($id);
        return view('reviews.create', compact('details'));
    }

    // ⭐ Delete
    public function destroy($id)
    {
        $record = ReviewsModel::findOrFail($id);

        // Delete image
        if ($record->image) {

            $filePath = public_path(str_replace(url('/').'/', '', $record->image));

            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $record->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Review deleted successfully.');
    }
}
