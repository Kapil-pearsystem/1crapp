<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmbedPageModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EmbedPageController extends Controller
{
    /**
     * Show all embedded pages list.
     */
    public function index()
    {
        $lists = EmbedPageModel::where('created_by',Auth::id())->orderBy('id', 'DESC')->get();
        return view('embed-page.index', compact('lists'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('embed-page.add');
    }

    /**
     * Store or update embedded page.
     */
    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'embed_link'  => 'required|string',
        'status'      => 'required|in:active,inactive',
    ]);

    // Generate slug from title
    $slug = Str::slug($request->title);

    // Check if a record with the same slug already exists
    $query = EmbedPageModel::where(['page_url'=> $slug, 'created_by'=>Auth::id()]);
    if ($request->id) {
        $query->where('id', '!=', $request->id); // exclude current record when updating
    }

    if ($query->exists()) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'An embed page with the same title already exists. Please choose a different title.');
    }

    // Create or update record
    $embedPage = $request->id 
        ? EmbedPageModel::find($request->id) 
        : new EmbedPageModel();

    if ($request->id && !$embedPage) {
        return redirect()->back()->with('error', 'Embed page not found.');
    }

    $embedPage->title        = $request->title;
    $embedPage->page_url     = $slug;
    $embedPage->embed_link   = $request->embed_link;
    $embedPage->status       = $request->status;
    $embedPage->login_status = $request->login_status;
    $embedPage->created_by   = Auth::id();

    $embedPage->save();

    $msg = $request->id 
        ? 'Embed page updated successfully.' 
        : 'Embed page created successfully.';

    return redirect()->route('embed-page.index')->with('success', $msg);
}


    /**
     * Edit form.
     */
    public function edit($id)
    {
        $details = EmbedPageModel::find($id);

        if (!$details) {
            return redirect()->route('admin.embed-page.index')->with('error', 'Embed page not found.');
        }

        return view('embed-page.add', compact('details'));
    }

    /**
     * Delete record.
     */
    public function destroy($id)
    {
        $embedPage = EmbedPageModel::find($id);

        if (!$embedPage) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $embedPage->delete();

        return redirect()->route('embed-page.index')->with('success', 'Embed page deleted successfully.');
    }
}
