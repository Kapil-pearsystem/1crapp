<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NeedHelpModel;
use Illuminate\Support\Facades\File;


class NeedHelpController extends Controller
{
    public function index()
    {
        $lists = NeedHelpModel::where('created_by', auth()->user()->id)->get();
        return view('need-help.index', compact('lists'));
    }
    public function create()
    {
        return view('need-help.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'url_new_tab' => 'nullable|boolean',
            'link_name'  =>  'nullable|string|max:255',
            'image' => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
            'priority' => 'required|integer|min:0',
            'status' => 'required|in:0,1',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/'), $imageName);
            $imagePath = 'uploads/' . $imageName;

            if ($request->id) {
                $old = NeedHelpModel::find($request->id);
                if ($old && File::exists(public_path($old->image))) {
                    File::delete(public_path($old->image));
                }
            }
        } else {
            $imagePath = base64_decode($request->old_image ?? '');
        }

        if ($request->id) {
            $needHelp = NeedHelpModel::find($request->id);
            $message = 'Help item updated successfully';
        } else {
            $needHelp = new NeedHelpModel();
            $message = 'Help item created successfully';
        }

        $needHelp->title = $request->title;
        $needHelp->url = $request->url;
        $needHelp->url_new_tab = $request->url_new_tab ?? 0;
        $needHelp->link_name = $request->link_name;
        $needHelp->image = $imagePath;
        $needHelp->priority = $request->priority;
        $needHelp->status = $request->status;
        $needHelp->created_by = auth()->user()->id;

        if ($needHelp->save()) {
            return redirect()->route('need-help.index')->with('success', $message);
        } else {
            return redirect()->back()->withInput()->with('error', 'Something went wrong!');
        }
    }
    public function edit($id)
    {
        $details = NeedHelpModel::findOrFail($id);
        return view('need-help.create', compact('details'));
    }
    public function destroy($id)
    {
        $needHelp = NeedHelpModel::find($id);

        if (!$needHelp) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        if ($needHelp->image && File::exists(public_path($needHelp->image))) {
            File::delete(public_path($needHelp->image));
        }

        $needHelp->delete();

        return redirect()->route('need-help.index')->with('success', 'Help record deleted successfully.');
    }
}
