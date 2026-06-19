<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuthTempCategoryModel;
use App\Models\AuthTempModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthTempController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // dd(AuthTempModel::where('category', 5)->first()->toArray());
        $lists =  AuthTempCategoryModel::with('template')->where('status', 1);
        if(auth()->user()->role_id == 1){
            $lists = $lists->orWhere('status', 2);
        }
        $lists = $lists->get();
        // dd($lists);
        return view('auth-temp.index',compact('lists'));
    }
    public function edit($cat_id){
        $category =  AuthTempCategoryModel::find($cat_id);
        $details = AuthTempModel::where(['category' => $cat_id, 'agent_id'=> auth()->id()])->first();
        // dd($details);
        return view('auth-temp.edit',compact('details', 'category'));
    }
    public function store(Request $request){
        // Validate the incoming request data
        $request->validate([
            'category_id' => 'required|exists:tbl_authtempcategory,id',
            'title' => 'required|string|max:555',
            'subject' => 'required|string|max:555',
            'top_content' => 'required|string',
            'bottom_content' => 'required|string',
            'copyright_text' => 'required|string',
        ]);
        // Either find the existing business card or create a new instance
        $data = AuthTempModel::where(['category' => $request->category_id, 'agent_id'=> auth()->id()])->first();
        $msg = 'Admin Email updated successfully!';
        if(is_null($data)){
            $data = new AuthTempModel();
            $msg = 'Admin Email created successfully!';
        }
        if($request->hasFile('logo')) {
            $logoName = time() . '_' . $request->logo->getClientOriginalName();
            $request->logo->move(public_path('uploads/'), $logoName);
            $data->logo = asset('uploads/'.$logoName);
            if($request->old_logo && file_exists(public_path($request->old_logo))) {
                unlink(public_path($request->old_logo));
            }
        }
        // dd($data->logo);
        // Set the properties manually
        $data->title = $request->title;
        $data->agent_id = Auth::user()->id;
        $data->category = $request->category_id;
        $data->subject = $request->subject;
        $data->top_content = $request->top_content;
        $data->bottom_content = $request->bottom_content;
        $data->copyright_text = $request->copyright_text;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('admin-emails.index')->with(['success' => $msg]);
    }
    public function view($cat_id)
    {
        $category = AuthTempCategoryModel::findOrFail($cat_id);
        $details = AuthTempModel::where(['category' => $cat_id, 'agent_id' => auth()->id()])->first();
        if(is_null($details)){
            return redirect()->route('admin-emails.index')->with(['error' => 'No Mail Data Found!']);
        }
        $data = view(
            'mail-temp.admin-preview-mail.' . $category->tempFileName,
            compact('details')
        )->render();

        return $data;
    }
}