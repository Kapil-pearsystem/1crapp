<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectCategoryModel;

class ProjectCategoryController extends Controller
{
    // Show list
    public function index()
    {
        $lists = ProjectCategoryModel::where('created_by', auth()->id())->get();
        return view('project-category.index', compact('lists'));
    }

    // Show create form
    public function create()
    {
        return view('project-category.create');
    }

    // ADD + EDIT both here
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:0,1',
        ]);

        // ⭐ Determine Add or Edit
        if ($request->id) {
            $record = ProjectCategoryModel::findOrFail($request->id);
            $message = "Project Category updated successfully!";
        } else {
            $record = new ProjectCategoryModel();
            $message = "Project Category created successfully!";
        }

        // ⭐ Assign values
        $record->title       = $request->title;
        $record->description = $request->description;
        $record->status      = $request->status;
        $record->created_by  = auth()->id();

        $record->save();

        return redirect()->route('project-category.index')->with('success', $message);
    }

    // Edit
    public function edit($id)
    {
        $details = ProjectCategoryModel::findOrFail($id);
        return view('project-category.create', compact('details'));
    }

    // Delete
    public function destroy($id)
    {
        $record = ProjectCategoryModel::findOrFail($id);
        $record->delete();

        return redirect()->route('project-category.index')
            ->with('success', 'Project Category deleted successfully.');
    }
}
