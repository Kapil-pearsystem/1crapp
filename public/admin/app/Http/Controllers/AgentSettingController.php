<?php

namespace App\Http\Controllers;

use App\Models\AgentSettingModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AgentSettingController extends Controller
{
    public function index()
{
    $lists = AgentSettingModel::orderBy('created_at', 'desc')->get();
    return view('agent-setting.index', compact('lists'));
}
   public function create()
   {
    return view('agent-setting.create');
   }
   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
         'category' => [
                'required',
                'integer',
                'in:1,2,3,4',
                Rule::unique('tbl_agent_settings', 'category')->ignore($request->id),
            ],
        'tutorial_link' => 'required|string|max:255',
        'video_link'    => 'required|url|max:255',
        'status'        => 'required|in:0,1',
        'tutorial_link_new_tab' => 'nullable|boolean',
        'video_link_new_tab'    => 'nullable|boolean',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    if ($request->id) {
        $setting = AgentSettingModel::find($request->id);
        $msg = 'Agent setting updated successfully.';
    } else {
        $setting = new AgentSettingModel();
        $msg = 'Agent setting added successfully.';

    }

    $setting->category = $request->category;
    $setting->tutorial_link = $request->tutorial_link;
    $setting->tutorial_link_new_tab = $request->has('tutorial_link_new_tab') ? 1 : 0;
    $setting->video_link = $request->video_link;
    $setting->video_link_new_tab = $request->has('video_link_new_tab') ? 1 : 0;
    $setting->status = $request->status;

    $setting->save();

    return redirect()->route('agent-setting.index')->with('success', $msg);
}
public function edit($id)
{
    $details = AgentSettingModel::findOrFail($id);
    return view('agent-setting.create', compact('details'));
}
// public function delete($id)
// {
//     $agentSetting = AgentSettingModel::findOrFail($id);

//     $agentSetting->delete();

//     return redirect()->route('agent-setting.index')->with('success', 'Agent setting deleted successfully.');
// }

}
