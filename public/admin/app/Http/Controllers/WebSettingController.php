<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebSettingModel;

class WebSettingController extends Controller
{
    // Show list
    public function index()
    {
        $lists = WebSettingModel::where('created_by', auth()->id())->get();
        return view('web-setting.index', compact('lists'));
    }

    // Create page
    public function create()
    {
        return view('web-setting.create');
    }

    // Add / Edit
    public function store(Request $request)
    {
        $request->validate([
            'address'     => 'nullable|string',
            'phone'       => 'nullable|string|max:50',
            'email'       => 'nullable|email|max:255',
            'google_map'  => 'nullable|string',
            'status'      => 'required|in:0,1',
        ]);

        // Edit OR Add
        if ($request->id) {
            $record  = WebSettingModel::findOrFail($request->id);
            $message = "Web Setting updated successfully!";
        } else {
            $record  = new WebSettingModel();
            $message = "Web Setting created successfully!";
        }

        // Assign values
        $record->address     = $request->address;
        $record->phone       = $request->phone;
        $record->email       = $request->email;
        $record->google_map = html_entity_decode($request->google_map);

        $record->status      = $request->status;
        $record->created_by  = auth()->id();

        $record->save();

        return redirect()->route('web-setting.index')->with('success', $message);
    }

    // Edit page
    public function edit($id)
    {
        $details = WebSettingModel::findOrFail($id);
        return view('web-setting.create', compact('details'));
    }

    // Delete record
    public function destroy($id)
    {
        $record = WebSettingModel::findOrFail($id);
        $record->delete();

        return redirect()->route('web-setting.index')
            ->with('success', 'Web Setting deleted successfully.');
    }
}
