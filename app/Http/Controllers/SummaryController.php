<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Property;
use App\Models\MainProperty;


class SummaryController extends Controller
{
    function __construct()
    {
        $this->currency= '₹';
        $this->authid = Auth::id();
    }
    public function index(){
        echo 'summary page';
    }
    public function buy_sale_summary($propertyID){
        $MainProperty = $this->getPropertyById($propertyID);
        return view('dashboard.summary.buy-sale-summary',compact('MainProperty'));
    }
    public function buy_refinance_sale_summary($propertyID){
        $MainProperty = $this->getPropertyById($propertyID);
        return view('dashboard.summary.buy-refinance-sale-summary',compact('MainProperty'));
    }
    public function buy_hold_summary($propertyID){
        $MainProperty = $this->getPropertyById($propertyID);
        return view('dashboard.summary.buy-hold-summary',compact('MainProperty'));
    }
    public function buy_refinance_hold_summary($propertyID){
        $MainProperty = $this->getPropertyById($propertyID);
        return view('dashboard.summary.buy-refinance-hold-summary',compact('MainProperty'));
    }
    public function getPropertyById($id){
        $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')
                            ->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')
                            ->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')
                            ->leftjoin('rk_states','property_address.prop_state','rk_states.id')
                            ->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip','property_description.desc_lot','property_address.prop_unitno','desc_year','desc_parking')
                            ->where('user_id',Auth::id())
                            ->where('main_properties.prop_id',base64_decode($id));
        return $property_list_query->first();
    }
}