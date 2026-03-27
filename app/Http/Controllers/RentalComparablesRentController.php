<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\MainProperty;
use App\Models\PropertyAddress;
use App\Models\Subscription;
use App\Models\PropertyDescription;

class RentalComparablesRentController extends Controller
{
    public function MainProperty($id){
        $mainProperty = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')
                            ->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')
                            ->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')
                            ->leftjoin('rk_states','property_address.prop_state','rk_states.id')
                            ->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip','property_description.desc_lot','property_address.prop_unitno','desc_year','desc_parking')
                            ->where('user_id',Auth::id())
                            ->where('main_properties.prop_id',$id);
        $MainProperty = $mainProperty->first();
        return $MainProperty;
    }
    public function index($catefory, $id){
        $propertyID = base64_decode($id);
        $MainProperty = $this->MainProperty($propertyID);
        $userSubscription = Subscription::where('user_id',Auth::id())->orderBy('id','DESC')->first();

        $propertyList = new MainProperty();
        $propertyList = $propertyList->where('prop_dateOfSale','!=',NULL);
        $propertyList = $propertyList->whereNotIn('prop_id',[$propertyID]);
        $propertyList = $propertyList->get();
        $propertyList = $this->propertListCollect($propertyList,$MainProperty);
        $propertyListView = (string)view('rental-comps-rent.property_list',compact('propertyList','userSubscription'));

        $averageSalePriceSection = (string)view('rental-comps-rent.average-sale-price-section',compact('propertyList','MainProperty'));
        return view('rental-comps-rent.index',compact('MainProperty','propertyListView','averageSalePriceSection'));
    }

    public function listSortBy(Request $request){
        $MainProperty = $this->MainProperty($request->propID);
        $userSubscription = Subscription::where('user_id',Auth::id())->orderBy('id','DESC')->first();
        $propertyList = new MainProperty();
        $propertyList = $propertyList->where('prop_purchasePrice','!=',NULL);
        $propertyList = $propertyList->whereNotIn('prop_id',[$request->propID]);
        if($request->sortBy == 'Price'){
            $propertyList = $propertyList->orderBy('prop_purchasePrice','DESC');
        }elseif($request->sortBy == 'Listed'){
            $propertyList = $propertyList->orderBy('created_at','DESC');
        }
        $propertyList = $propertyList->get();
        $propertyList = $this->propertListCollect($propertyList,$MainProperty);
        if($request->sortBy == 'Price Sq Ft'){
            $propertyList = collect($propertyList)->sortByDesc('SqFtPrice');
        }elseif($request->sortBy == 'Distance'){
            $propertyList = collect($propertyList)->sortByDesc('distance');
        }
        $propertyListView = (string)view('rental-comps-rent.property_list',compact('propertyList','userSubscription'));
        return response()->json([
            'success' => true,
            'view'      => $propertyListView,
        ], 200);
    }

    private function propertListCollect($propertyList,$MainProperty){
        $propertyCollect = collect([]);
        foreach ($propertyList as $key => $value) {
            $singlePropertyCollect = collect([]);
            $singlePropertyCollect->put('prop_id',$value->prop_id);
            $singlePropertyCollect->put('prop_name',$value->prop_name);
            $singlePropertyCollect->put('propPrice',$value->prop_purchasePrice);
            $singlePropertyCollect->put('prop_dateOfSale',$value->prop_dateOfSale);

            $propDescription = PropertyDescription::where('prop_id',$value->prop_id)->first();
            $propAddress = PropertyAddress::where('prop_id',$value->prop_id)->first();
            $mainPropAddress = PropertyAddress::where('prop_id',$MainProperty->prop_id)->first();
            $distance = 0;
            if(!is_null($propAddress) && !is_null($mainPropAddress)){
                if(!is_null($mainPropAddress->latitude) && !is_null($mainPropAddress->longitude) && !is_null($propAddress->latitude) && !is_null($propAddress->longitude)){
                    $distance = FindDistance($mainPropAddress->latitude,$mainPropAddress->longitude,$propAddress->latitude,$propAddress->longitude,"M");
                }
            }

            $totalSqFt = TotalSquareFoot($MainProperty);
            $desc_type = '';
            $builtYear = '';
            $SqFt = '';
            if(!is_null($propDescription)){
                $desc_type = $propDescription->desc_type.' /';
                $builtYear = $propDescription->desc_year;
                $SqFt = $totalSqFt.' Sq.Ft. /';
            }
            $salePrice = $value->prop_salePrice;
            try {
                $SqFtPrice = number_format(($salePrice / $totalSqFt),2);
            } catch (\Throwable $th) {
                $SqFtPrice = 0;
            }

            $singlePropertyCollect->put('distance',$distance);
            $singlePropertyCollect->put('SqFtPrice',$SqFtPrice);
            $singlePropertyCollect->put('desc_type',$desc_type);
            $singlePropertyCollect->put('builtYear',$builtYear);
            $singlePropertyCollect->put('SqFt',$SqFt);
            $propertyCollect->push($singlePropertyCollect);
        }
        return $propertyCollect;
    }
}
