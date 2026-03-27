<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\MainProperty;
use App\Models\PropertyAddress;
use App\Models\PropertyDescription;

class PropertyCompareController extends Controller
{
    public function index(){
        $buyAnSellProperty = MainProperty::where('prop_type','Buy And Sell')->get();
        $buyAnHoldProperty = MainProperty::where('prop_type','Buy And Hold')->get();
        $buyHoldRefinanceProperty = MainProperty::where('prop_type','Buy, Hold And Refinance')->get();
        
        return view('property-compare.index',compact('buyAnSellProperty','buyAnHoldProperty','buyHoldRefinanceProperty'));
    }

    public function validatePropertyCompare(Request $request){
        $firstPropertyCompare = MainProperty::where('prop_id',$request->first_property_id)->first();
        $secondPropertyCompare = MainProperty::where('prop_id',$request->second_property_id)->first();
        if(isset($request->third_property_id)){
            $thirdPropertyValidation = $this->thirdPropertyValidation($request);
            return $thirdPropertyValidation;
        }
        
        $singleProperty = null;
        if($request->last_select == 'First'){
            $singleProperty = $firstPropertyCompare;
        }elseif($request->last_select == 'Second'){
            $singleProperty = $secondPropertyCompare;
        }
        // dd($request->last_select,$singleProperty->prop_name,$singleProperty->imageVideo);
        if(!is_null($singleProperty)){
            $propertyAddress = PropertyAddress::where('prop_id',$singleProperty->prop_id)->first();
            $propertyDescription = PropertyDescription::where('prop_id',$singleProperty->prop_id)->first();
            
            if(!is_null($firstPropertyCompare) && !is_null($secondPropertyCompare) && ($firstPropertyCompare->prop_type ==  $secondPropertyCompare->prop_type)){
                $compareStatus = true;
            }else{
                $compareStatus = false;
            }
            if(!is_null($firstPropertyCompare) && !is_null($secondPropertyCompare) && ($firstPropertyCompare->prop_id ==  $secondPropertyCompare->prop_id)){
                $compareStatus = false;
            }

            $imagePath = public_path($singleProperty->imageVideo);
            if(!is_null($singleProperty->imageVideo)){
                if (File::exists($imagePath)) {
                    $imagePath = asset($singleProperty->imageVideo);
                } else {
                    $imagePath = asset('img/image-new-property.png');
                }
            }else{
                $imagePath = asset('img/image-new-property.png');
            }
            return response()->json([
                'compareStatus' => $compareStatus,
                'view'          => (string)view('property-compare.prop-small-details',compact('singleProperty','propertyAddress','propertyDescription')),
                'image'         => $imagePath
            ], 200);
        }else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong...',
            ], 400);
        }
    }

    public function thirdPropertyValidation($request){
        if($request->last_select == 'First'){
            $propertyID = $request->first_property_id;
        }elseif($request->last_select == 'Second'){
            $propertyID = $request->second_property_id;
        }elseif($request->last_select == 'Third'){
            $propertyID = $request->third_property_id;
        }

        $property = MainProperty::where('prop_id',$propertyID)->first();
        $propertys = MainProperty::whereIn('prop_id',[$request->first_property_id, $request->second_property_id,$request->third_property_id])->get();
        $count = 0;
        foreach($propertys as $item){
            if($property->prop_type == $item->prop_type){
                $count++;
            }
        }
        if($count == 3){
            return response()->json([
                'compareStatus' => true,
                'compareCount'  => $count
            ], 200);
        }elseif($count == 2){
            return response()->json([
                'compareStatus' => true,
                'compareCount'  => $count
            ], 200);
        }else{
            return response()->json([
                'compareStatus' => false,
                'compareCount'  => $count
            ], 200);
        }
    }

    public function compareProperty(Request $request){
        // dd($request->all());
        if(isset($request->action) && $request->action == 'remove'){
            if($request->remove_property == 'First'){
                unset($request['first_property']);
            }elseif($request->remove_property == 'Second'){
                unset($request['second_property']);
            }elseif($request->remove_property == 'Third'){
                unset($request['third_property']);
            }
        }

        
        unset($request['_token']);
        // dd($request->all());
        $buyAnSellProperty = MainProperty::where('prop_type','Buy And Sell')->get();
        $buyAnHoldProperty = MainProperty::where('prop_type','Buy And Hold')->get();
        $buyHoldRefinanceProperty = MainProperty::where('prop_type','Buy, Hold And Refinance')->get();
        $propertyIds = array();

        if(isset($request->first_property)){
            $propertyIds[] = $request->first_property;
        }

        if(isset($request->second_property)){
            $propertyIds[] = $request->second_property;
        }

        if(isset($request->third_property)){
            $propertyIds[] = $request->third_property;
        }
        if(count($propertyIds) == 0){
            return redirect()->route('property.compare.index');
        }
        if(count($propertyIds) == 1){
            $firstPropertyId = $propertyIds[0];
            $request['first_property'] = $propertyIds[0];
            $request['second_property'] = null;
            $request['third_property'] = null;
            $firstProperty = MainProperty::where('prop_id',$firstPropertyId)->first();
            $firstPropertyDescription = PropertyDescription::where('prop_id',$firstPropertyId)->first();

            $secondProperty = null;
            $secondPropertyDescription = null;
        }

        if(count($propertyIds) == 2 || count($propertyIds) == 3){
            // dd(11111111111111);
            $firstPropertyId = $propertyIds[0];
            $secondPropertyId = $propertyIds[1];

            $request['first_property'] = $propertyIds[0];
            $request['second_property'] = $propertyIds[1];

            if(count($propertyIds) == 2){
                $request['third_property'] = null;
            }
            
            $firstProperty = MainProperty::where('prop_id',$firstPropertyId)->first();
            $secondProperty = MainProperty::where('prop_id',$secondPropertyId)->first();
            
            $firstPropertyDescription = PropertyDescription::where('prop_id',$firstPropertyId)->first();
            $secondPropertyDescription= PropertyDescription::where('prop_id',$secondPropertyId)->first();
        }
        $thirdProperty = null;
        $thirdPropertyDescription = null;
        if(count($propertyIds) == 3){
            $thirdProperty = MainProperty::where('prop_id',$propertyIds[2])->first();
            $thirdPropertyDescription= PropertyDescription::where('prop_id',$propertyIds[2])->first();
        }
        // dd($firstProperty,$secondProperty,$thirdProperty);
        $requests = $request->all();
        
        return view('property-compare.show',
                compact(
                    'requests',
                    'buyAnSellProperty',
                    'buyAnHoldProperty',
                    'buyHoldRefinanceProperty',
                    'firstProperty',
                    'secondProperty',
                    'thirdProperty',
                    'firstPropertyDescription',
                    'secondPropertyDescription',
                    'thirdPropertyDescription'
                )
            );
    }
}
