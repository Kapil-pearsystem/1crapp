<?php

namespace App\Http\Controllers;

use App\Models\BusinessCardModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
// use App\Helper\Helper as Helper;

class BusinessCard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $countries = DB::table('rk_countries')->select('id', 'name')->get();
        $card = BusinessCardModel::select('tbl_businesscard.*','rk_countries.name as country_name','rk_states.name as state_name','rk_cities.name as city_name')
        ->leftjoin('rk_countries','rk_countries.id','=','tbl_businesscard.country')
        ->leftjoin('rk_states','rk_states.id','=','tbl_businesscard.state')
        ->leftjoin('rk_cities','rk_cities.id','=','tbl_businesscard.city')
        ->where('tbl_businesscard.user_id', auth()->user()->id)
        ->where('tbl_businesscard.category', 2)
        ->orderBy('tbl_businesscard.id','desc')
        ->first();
        // dd($card);
        return view('dashboard.customer-business-card',compact('card', 'countries'));
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
        return view('dashboard.business-card-view',compact('business_card','countries'));
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
        $businesscard->category = 2;
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
        return redirect()->back()->with(['success' => $msg]);
    }
}