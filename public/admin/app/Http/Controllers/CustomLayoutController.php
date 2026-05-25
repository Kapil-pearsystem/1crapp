<?php

namespace App\Http\Controllers;

use App\Models\CustomLayoutModel;
use App\Models\CustomMenuModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomLayoutController extends Controller
{
    public function index()
    {
        $layout = CustomLayoutModel::where('created_by', auth()->user()->id)->first();

        $menus = CustomMenuModel::select(
                'tbl_custommenu.*',
                'cm.title as parent_title'
            )
            ->leftJoin('tbl_custommenu as cm', 'tbl_custommenu.parent_id', '=', 'cm.id')
            ->where('tbl_custommenu.created_by', auth()->user()->id)
            ->orderBy('tbl_custommenu.id', 'DESC')
            ->get();

        $parents = CustomMenuModel::select('id', 'title')
            ->whereNull('parent_id')
            ->orderBy('title', 'ASC')
            ->get();

        return view('custom-layout.index', compact('layout', 'menus', 'parents'));
    }

    public function save(Request $request)
    {
        if ($request->id) {
            $setting = CustomLayoutModel::find($request->id);
            $msg = 'Custom Layout updated successfully.';
        } else {
            $setting = new CustomLayoutModel();
            $msg = 'Custom Layout added successfully.';

        }
        if($request->hasFile('logo')) {
            $imageName = time() . '_' . $request->logo->getClientOriginalName();
            $request->logo->move(public_path('uploads'), $imageName);
            $logo = asset('uploads/'.$imageName);
            $setting->logo = $logo;
        }
        $setting->btn_text = $request->btn_text;
        $setting->btn_bg_color = $request->btn_bg_color;
        $setting->btn_text_color = $request->btn_text_color;
        $setting->btn_link = $request->btn_link;
        $setting->open_new_tab = $request->has('open_new_tab') ? 1 : 0;
        $setting->copyright_text = $request->copyright_text;
        $setting->status = 1;
        $setting->created_by = auth()->id();
        $setting->save();

        return redirect()->back()->with('success', $msg);
    }
    public function save_menu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if($request->id){
            $menu = CustomMenuModel::find($request->id);
            $msg = 'Menu updated successfully.';
        } else {
            $menu = new CustomMenuModel();
            $msg = 'Menu added successfully.';
        }
        $menu->icon = $request->icon;
        $menu->title = $request->title;
        $menu->page_url = $request->page_url;
        $menu->parent_id = $request->parent_id;
        $menu->type = $request->type;
        $menu->open_new_tab = $request->open_new_tab;
        $menu->status = $request->status;
        $menu->created_by = auth()->id();
        $menu->save();
        return redirect()->back()->with('success', $msg);
    }
    public function delete_menu($id){
        $Menu = CustomMenuModel::find($id);
        if(is_null($Menu)){
            return redirect()->back()->with('error', 'No Data Found.');
        }
        $Menu->delete();
        return redirect()->back()->with('success', 'Menu Deleted Successfully.');
    }



}
