<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\MainProperty;

class BuyHoldProjectionController extends Controller
{
    public function index($category=NULL, $id){
        $propertyID = base64_decode($id);
        $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')
                            ->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')
                            ->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')
                            ->leftjoin('rk_states','property_address.prop_state','rk_states.id')
                            ->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip','property_description.desc_lot','property_address.prop_unitno','desc_year','desc_parking')
                            ->where('user_id',Auth::id())
                            ->where('main_properties.prop_id',$propertyID);
        $MainProperty = $property_list_query->first();
        // dd($MainProperty);
        return view('buy-hold-projection.index',compact('MainProperty'));
    }
}
