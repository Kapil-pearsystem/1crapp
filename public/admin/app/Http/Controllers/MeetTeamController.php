<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetTeamModel;

class MeetTeamController extends Controller
{
    // ⭐ LIST PAGE
    public function index()
    {
        $lists = MeetTeamModel::where('created_by', auth()->id())
                              ->orderBy('id', 'DESC')
                              ->get();

        return view('meet-team.index', compact('lists'));
    }

    // ⭐ CREATE FORM
    public function create()
    {
        return view('meet-team.create');
    }

    // ⭐ STORE + UPDATE
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'status'        => 'required|in:0,1',
            'button_title'  => 'nullable|string|max:100',
            'button_link'   => 'nullable|url|max:255',
            'short_content' => 'nullable|string',
            'content'       => 'nullable|string',
        ]);

        if ($request->id) {
            $record = MeetTeamModel::findOrFail($request->id);
            $message = "Meet Team updated successfully!";
        } else {
            $record = new MeetTeamModel();
            $message = "Meet Team created successfully!";
        }

        // DATA SET
        $record->title         = $request->title;
        $record->description   = $request->description;
        $record->button_title  = $request->button_title;
        $record->button_link   = $request->button_link;
        $record->short_content = $request->short_content;
        $record->content       = $request->content;
        $record->status        = $request->status;
        $record->created_by    = auth()->id();

        $record->save();

        return redirect()->route('meet-team.index')->with('success', $message);
    }

    // ⭐ EDIT FORM
    public function edit($id)
    {
        $details = MeetTeamModel::findOrFail($id);
        return view('meet-team.create', compact('details'));
    }

    // ⭐ DELETE
    public function destroy($id)
    {
        $record = MeetTeamModel::findOrFail($id);
        $record->delete();

        return redirect()->route('meet-team.index')
                         ->with('success', 'Meet Team deleted successfully.');
    }
}
