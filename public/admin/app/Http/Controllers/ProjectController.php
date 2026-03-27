<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Models\ProjectImageModel;
use App\Models\ProjectCategoryModel;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    // List all projects
    public function index()
    {
        $projects = ProjectModel::with('media', 'category')
            ->where('created_by', auth()->id())
            ->get();

        return view('project.index', compact('projects'));
    }

    // Create
    public function create()
    {
        $categories = ProjectCategoryModel::where('status', 1)->get();
        return view('project.create', compact('categories'));
    }

    // Store / Update
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:tbl_project_categories,id',
            'title'       => 'required|string|max:255',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:10240',
        ]);

        // Update or Create
        if ($request->id) {
            $project = ProjectModel::findOrFail($request->id);
            $message = "Project updated successfully!";
        } else {
            $project = new ProjectModel();
            $message = "Project created successfully!";
        }

        $project->category_id = $request->category_id;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->created_by = auth()->id();
        $project->save();

        // Handle Media
        if ($request->hasFile('media_files')) {
            foreach ($request->media_files as $key => $file) {

                $mediaType = $request->media_types[$key] ?? 'image';
                $link      = $request->media_links[$key] ?? null;
                $status    = $request->media_statuses[$key] ?? 1;

                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/projects/'), $fileName);

                // FULL URL SAVE
                $filePath = url('uploads/projects/' . $fileName);

                ProjectImageModel::create([
                    'project_id'  => $project->id,
                    'category_id' => $project->category_id, // <-- FIXED
                    'media_type'  => $mediaType,
                    'file_path'   => $filePath,
                    'link'        => $link,
                    'status'      => $status,
                    'created_by'  => auth()->id(),
                ]);
            }
        }

        return redirect()->route('project.index')->with('success', $message);
    }

    // EDIT
    public function edit($id)
    {
        $project = ProjectModel::with('media')->findOrFail($id);
        $categories = ProjectCategoryModel::where('status', 1)->get();

        return view('project.create', compact('project', 'categories'));
    }

    // DELETE
    public function destroy($id)
    {
        $project = ProjectModel::findOrFail($id);

        foreach ($project->media as $media) {

            $localPath = public_path(str_replace(url('/').'/', '', $media->file_path));

            if (File::exists($localPath)) {
                File::delete($localPath);
            }

            $media->delete();
        }

        $project->delete();
        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
