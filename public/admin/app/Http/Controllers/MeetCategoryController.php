<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetCategoryModel;

class MeetCategoryController extends Controller
{
    // Show list
    public function index(Request $request)
    {
        $query = MeetCategoryModel::where('created_by', auth()->id());

        // Search filter
        if ($request->search) {
            $query->where('category', 'LIKE', '%'.$request->search.'%');
        }

        // Status filter
        if ($request->status != '') {
            $query->where('status', $request->status);
        }

        $lists = $query->orderBy('id', 'DESC')->paginate(10);

        return view('meet-category.index', compact('lists'));
    }


    // Show Create Form
    public function create()
    {
        return view('meet-category.create');
    }


    // Add + Edit
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'status'   => 'required|in:0,1',
        ]);

        // Add or Edit
        if ($request->id) {
            $record = MeetCategoryModel::findOrFail($request->id);
            $message = "Category updated successfully!";
        } else {
            $record = new MeetCategoryModel();
            $message = "Category added successfully!";
        }

        // Assign values
        $record->category = $request->category;
        $record->status = $request->status;
        $record->created_by = auth()->id();
        $record->save();

        return redirect()->route('meet-category.index')->with('success', $message);
    }


    // Edit page
    public function edit($id)
    {
        $details = MeetCategoryModel::findOrFail($id);
        return view('meet-category.create', compact('details'));
    }


    // Delete
    public function destroy($id)
    {
        $record = MeetCategoryModel::findOrFail($id);
        $record->delete();

        return redirect()->route('meet-category.index')
            ->with('success', 'Category deleted successfully.');
    }
}
