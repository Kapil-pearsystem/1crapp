<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUsesMpdel;
use Illuminate\Support\Facades\File;


class UserHeroSectionController extends Controller
{
    public function index()
    {
        $lists = AppUsesMpdel::where('created_by', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('app-uses.index', compact('lists'));
    }
    public function create()
    {
        return view('app-uses.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'realtor_title' => 'required|string|max:255',
            'realtor_subtitle' => 'required|string|max:255',
            'realtor_shortdesc' => 'required|string|max:255',
            'realtor_description' => 'required|string',
            'realtor_btntext' => 'required|string|max:255',
            'realtor_btnlink' => 'required|url',
            'realtor_btnlink_new_tab' => 'nullable|boolean',
            'realtor_link_name'  =>  'nullable|string|max:255',
            'realtor_image' => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
            'investor_title' => 'required|string|max:255',
            'investor_subtitle' => 'required|string|max:255',
            'investor_shortdesc' => 'required|string|max:255',
            'investor_description' => 'required|string',
            'investor_btntext' => 'required|string|max:255',
            'investor_btnlink' => 'required|url',
            'investor_btnlink_new_tab' => 'nullable|boolean',
            'investor_link_name' => 'nullable|string|max:255',
            'investor_image' => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:0,1',
        ]);
        if ($request->hasFile('realtor_image')) {
            $imageName = time() . '_' . $request->realtor_image->getClientOriginalName();
            $request->realtor_image->move(public_path('uploads/'), $imageName);
            $realtorImagePath = asset('uploads/' . $imageName);

            if ($request->id) {
                $old = AppUsesMpdel::find($request->id);
                if ($old && File::exists(public_path($old->image))) {
                    File::delete(public_path($old->image));
                }
            }
        } else {
            $realtorImagePath = base64_decode($request->old_realtor_image ?? '');
        }
        if ($request->hasFile('investor_image')) {
            $imageName = time() . '_' . $request->investor_image->getClientOriginalName();
            $request->investor_image->move(public_path('uploads/'), $imageName);
            $investorImagePath = asset('uploads/' . $imageName);

            if ($request->id) {
                $old = AppUsesMpdel::find($request->id);
                if ($old && File::exists(public_path($old->image))) {
                    File::delete(public_path($old->image));
                }
            }
        } else {
            $investorImagePath = base64_decode($request->old_investor_image ?? '');
        }

        if ($request->id) {
            $data = AppUsesMpdel::find($request->id);
            $message = '1CRApp Uses updated successfully';
        } else {
            $data = new AppUsesMpdel();
            $message = '1CRApp Uses created successfully';
        }
        $data->realtor_title = $request->realtor_title;
        $data->realtor_subtitle = $request->realtor_subtitle;
        $data->realtor_shortdesc = $request->realtor_shortdesc;
        $data->realtor_description = $request->realtor_description;
        $data->realtor_btntext = $request->realtor_btntext;
        $data->realtor_btnlink = $request->realtor_btnlink;
        $data->realtor_btnlink_new_tab = $request->realtor_btnlink_new_tab ?? 0;
        $data->realtor_image = $realtorImagePath;
        $data->investor_title = $request->investor_title;
        $data->investor_subtitle = $request->investor_subtitle;
        $data->investor_shortdesc = $request->investor_shortdesc;
        $data->investor_description = $request->investor_description;
        $data->investor_btntext = $request->investor_btntext;
        $data->investor_btnlink = $request->investor_btnlink;
        $data->investor_btnlink_new_tab = $request->investor_btnlink_new_tab ?? 0;
        $data->investor_image = $investorImagePath;
        $data->status = $request->status;
        $data->created_by = auth()->user()->id;

        if ($data->save()) {
            return redirect()->route('user-hero-section.index')->with('success', $message);
        } else {
            return redirect()->back()->withInput()->with('error', 'Something went wrong!');
        }
    }
    public function edit($id)
    {
        $details = AppUsesMpdel::findOrFail($id);
        return view('app-uses.create', compact('details'));
    }
    public function destroy($id)
    {
        $needHelp = AppUsesMpdel::find($id);

        if (!$needHelp) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        if ($needHelp->image && File::exists(public_path($needHelp->image))) {
            File::delete(public_path($needHelp->image));
        }

        $needHelp->delete();

        return redirect()->route('user-hero-section.index')->with('success', '1CRApp Uses deleted successfully.');
    }
}
