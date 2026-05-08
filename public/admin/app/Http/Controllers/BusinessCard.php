<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BusinessCardModel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
// use App\Helper\Helper as Helper;

class BusinessCard extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $lists = BusinessCardModel::select('tbl_businesscard.*','rk_countries.name as country_name','rk_states.name as state_name','rk_cities.name as city_name')
        ->leftjoin('rk_countries','rk_countries.id','=','tbl_businesscard.country')
        ->leftjoin('rk_states','rk_states.id','=','tbl_businesscard.state')
        ->leftjoin('rk_cities','rk_cities.id','=','tbl_businesscard.city')
        ->where('tbl_businesscard.user_id', auth()->user()->id)
        ->where('tbl_businesscard.category', 1)
        ->orderBy('tbl_businesscard.id','desc')
        ->paginate(10);
        // dd($lists);
        return view('business-card.index',compact('lists'));
    }
    public function view(){
        $countries = DB::table('rk_countries')->select('id', 'name')->get();
        $business_card = BusinessCardModel::select('tbl_businesscard.*','rk_countries.name as country_name','rk_states.name as state_name','rk_cities.name as city_name')
        ->leftjoin('rk_countries','rk_countries.id','=','tbl_businesscard.country')
        ->leftjoin('rk_states','rk_states.id','=','tbl_businesscard.state')
        ->leftjoin('rk_cities','rk_cities.id','=','tbl_businesscard.city')
        ->where('tbl_businesscard.user_id', auth()->user()->id)
        ->where('tbl_businesscard.category', 1)
        ->orWhere('tbl_businesscard.is_public', 1)
        ->orderBy('tbl_businesscard.id','desc')
        ->first();
        // dd($business_card);
        return view('business-card.view',compact('business_card','countries'));
    }
    public function create(){
        $countries = DB::table('rk_countries')->select('id', 'name')->get();
        return view('business-card.create',compact('countries'));
    }
    public function edit($id){
        $details = BusinessCardModel::find($id);
        $countries = DB::table('rk_countries')->select('id', 'name')->get();
        // dd($details);
        return view('business-card.create',compact('countries','details'));
    }
    public function save(Request $request)
    {
        // dd($request->all());
        $userId = Auth::user()->id;
        // Validate the incoming request data
        $request->validate([
            'link_name' => 'required|string|max:355',
            'email' => 'required|email|max:155',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            // 'organization' => 'required|string|max:255',
            // 'title' => 'required|string|max:255',
            // 'telephone' => 'required|string|max:255',
            // 'website' => 'nullable|url|max:255',
            // 'facebook' => 'nullable|url|max:255',
            // 'linkedin' => 'nullable|url|max:255',
            // 'whatsapp' => 'nullable|string|max:255',
            // 'instagram' => 'nullable|url|max:255',
            // 'twitter' => 'nullable|url|max:255',
            // 'city' => 'required|integer',
            // 'state' => 'required|integer',
            // 'country' => 'required|integer',
            // 'smstemplate' => 'required|string',
            // 'scanning_popup' => 'required|integer',
            // 'contact_popup' => 'required|integer',
        ]);
        // Either find the existing business card or create a new instance
        if($request->id){
            $businesscard = BusinessCardModel::find($request->id);
            $msg = 'Business card updated successfully!';
        }else{
            $businesscard = new BusinessCardModel();
            $msg = 'Business card created successfully!';
        }
        if($request->hasFile('photo')) {
            $photoName = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('uploads/'), $photoName);
            $photo_name = asset('uploads/'.$photoName);
            if($request->old_photo && file_exists(public_path($request->old_photo))) {
                unlink(public_path($request->old_photo));
            }
        }else{
            $photo_name = base64_decode($request->old_photo);
        }
        if(BusinessCardModel::where(['created_by' => $userId, 'is_public' => 1])->exists()){
            $businesscard->is_public = 0;
        }else{
            $businesscard->is_public = 1;
        }
        // Set the properties manually
        $businesscard->user_id = $userId;
        $businesscard->category = 1;
        $businesscard->link_name = $request->link_name;
        $businesscard->link_slug = Str::slug($request->link_name);
        $businesscard->layout = $request->layout ?? 0;
        $businesscard->photo = $photo_name; // Handle photo upload logic separately
        $businesscard->email = $request->email;
        $businesscard->first_name = $request->first_name;
        $businesscard->last_name = $request->last_name;
        $businesscard->chatboat = $request->chatboat;
        $businesscard->designation = $request->designation;
        $businesscard->r_bot = $request->r_bot;
        $businesscard->organization = $request->organization;
        $businesscard->title = $request->title;
        $businesscard->telephone = $request->telephone;
        $businesscard->website = $request->website;
        $businesscard->facebook = $request->facebook;
        $businesscard->linkedin = $request->linkedin;
        $businesscard->whatsapp = $request->whatsapp;
        $businesscard->instagram = $request->instagram;
        $businesscard->twitter = $request->twitter;
        $businesscard->city = $request->city;
        $businesscard->state = $request->state;
        $businesscard->country = $request->country;
        $businesscard->address = $request->address;
        $businesscard->smstemplate = $request->smstemplate;
        $businesscard->scanning_popup = $request->scanning_popup;
        $businesscard->contact_popup = $request->contact_popup;
        $businesscard->created_by = $userId;
        $businesscard->status = $request->status ?? 1;
        // Save the business card
        $businesscard->save();
        return redirect()->route('business-card.index')->with(['success' => $msg]);
    }
    public function delete($id){
        $businesscard = BusinessCardModel::find($id);
        if($businesscard){
            if (file_exists(public_path($businesscard->photo))) {
                unlink(public_path($businesscard->photo));
            }
            $businesscard->delete();
            return redirect()->route('business-card.index')->with(['success' => 'Business card deleted successfully!']);
        }else{
            return redirect()->route('business-card.index')->with(['error' => 'Business card not found!']);
        }
    }
    public function make_public(){
        $card_id = request()->id;
        $userId = Auth::user()->id;
        BusinessCardModel::where(['created_by' => $userId])->update(['is_public' => 0]);
        $businesscard = BusinessCardModel::where(['created_by' => $userId, 'id' => $card_id])->first();
        if($businesscard){
            $businesscard->is_public = 1;
            $businesscard->save();
            return response()->json(['status' => true, 'message' => 'Business card made public successfully!']);
        }else{
            return response()->json(['status' => false, 'message' => 'Business card not found!']);
        }
    }
}