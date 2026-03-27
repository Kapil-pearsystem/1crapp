<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderNavigationModel;
use App\Models\AssetsModel;;
use Illuminate\Support\Facades\File;

class HeaderNavigationController extends Controller
{
    // Show all records
    public function index()
    {
        $lists = HeaderNavigationModel::with([
            'parentNavigation:id,title', // Load only title of parent
            'asset:id,title,url'         // Load asset info (optional)
        ])
        ->where('created_by', auth()->id())
        ->orderBy('id', 'DESC')
        ->get();
    
        return view('header-navigation.index', compact('lists'));
    }


    // Show create form
    public function create()
    {
        $pages =  AssetsModel::where(['created_by'=>auth()->user()->id])->where('status',1)->orderBy('id','desc')->get();
        return view('header-navigation.create',compact('pages'));
    }

    // Store or update record
    public function store(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'is_authorized' => 'required|in:0,1,2',
            'parent_page_id' => 'nullable|integer',
            'page_id' => 'required|integer',
            'priority' => 'required|integer|min:0',
            'status' => 'required|in:0,1',
        ]);
       
        if ($request->id) {
            $record = HeaderNavigationModel::find($request->id);
            $message = 'Record updated successfully';
        } else {
            $record = new HeaderNavigationModel();
            $message = 'Record created successfully';
        }

        $record->title = $request->title;
        $record->is_authorized = $request->is_authorized;
        $record->parent_page_id = $request->parent_page_id;
        $record->page_id = $request->page_id;
        $record->priority = $request->priority;
        $record->status = $request->status;
        $record->created_by = auth()->id();
        $record->save();

        return redirect()->route('header-navigation.index')->with('success', $message);
    }

    // Edit record
    public function edit($id)
    {
        $pages =  AssetsModel::where(['created_by'=>auth()->user()->id])->where('status',1)->orderBy('id','desc')->get();
        $details = HeaderNavigationModel::findOrFail($id);
        return view('header-navigation.create', compact('details','pages'));
    }

    // Delete record
    public function destroy($id)
    {
        $record = HeaderNavigationModel::findOrFail($id);

        $record->delete();

        return redirect()->route('header-navigation.index')->with('success', 'Record deleted successfully.');
    }
}
