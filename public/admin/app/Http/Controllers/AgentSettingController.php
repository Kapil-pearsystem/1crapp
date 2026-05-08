<?php

namespace App\Http\Controllers;

use App\Models\AgentSettingModel;
use App\Models\AdbSettingsModel;
use App\Models\JoinCommunityModel;
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

public function adb_index()
{
    $settings = AdbSettingsModel::first();
    $communities = JoinCommunityModel::orderBy('id', 'desc')->get();
    return view('agent-setting.adb-index', compact('settings','communities'));
}
public function store_community(Request $request)
{
    $validator = Validator::make($request->all(), [
        'icon' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'btn_text' => 'required|string|max:255',
        'btn_link' => 'required|url|max:255',
        'priority' => 'required|numeric|min:0',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    if($request->id){
        $community = JoinCommunityModel::find($request->id);
        $msg = 'Community entry updated successfully.';
    } else {
        $community = new JoinCommunityModel();
        $msg = 'Community entry added successfully.';
    }
    $community->icon = $request->icon;
    $community->title = $request->title;
    $community->content = $request->content;
    $community->btn_text = $request->btn_text;
    $community->btn_link = $request->btn_link;
    $community->priority = $request->priority;
    $community->status = $request->status;
    $community->created_by = auth()->id();
    $community->save();
    return redirect()->route('adb-setting.index')->with('success', $msg);
}
public function delete_community($id){
    $community = JoinCommunityModel::find($id);
    if(is_null($community)){
        return redirect()->back()->with('error', 'No Data Found.');
    }
    $community->delete();
    return redirect()->back()->with('success', 'Community Deleted Successfully.');
}
public function store_chatbot(Request $request)
{
    $validator = Validator::make($request->all(), [
        'demo_link' => 'required|string|max:255',
        'chatbot_code' => 'required'
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    if($request->id){
        $adbSettings = AdbSettingsModel::find($request->id);
        $msg = 'Setting updated successfully.';
    } else {
        $adbSettings = new AdbSettingsModel();
        $msg = 'Setting added successfully.';
    }
    $adbSettings->demo_link = $request->demo_link;
    $adbSettings->demo_link_enable = $request->demo_link_enable??0;
    $adbSettings->chatbot_code = $request->chatbot_code;
    $adbSettings->chatbot_code_enable = $request->chatbot_code_enable??0;
    $adbSettings->created_by = auth()->id();
    $adbSettings->save();
    return redirect()->route('adb-setting.index')->with('success', $msg);
}



}
