<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Property;
use App\Models\MainProperty;
use App\Models\PropertyAddress;
use App\Models\PropertyDescription;
use App\Models\ItemPaidAmount;
use App\Models\ItemPurchaseCost;
use App\Models\PropertyLoan;
use App\Models\itemExtraCharge;
use App\Models\ItemOtherIncome;
use App\Models\ItemVacantRate;
use App\Models\ItemOperativeExpense;
use App\Models\PropertyRefinance;
use App\Models\ItemRefinanceCost;
use App\Models\UserTag;
use App\Models\itemImprovementCost;
use App\Models\itemHoldingCost;
use App\Models\itemSellingCost;
use App\Models\PropertyTypeModel;
use App\Models\itemConvDeed;
use App\Models\ItemServicesMisclaniousCost;

class UpdatePropertyController extends Controller
{
    function __construct()
    {

        $this->currency= '₹';
        $this->authid = Auth::id();
    }
    public function edit_description($type, $propertyID)
    {
        $propertyID = base64_decode($propertyID);
        $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')
                            ->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')
                            ->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')
                            ->leftjoin('rk_states','property_address.prop_state','rk_states.id')
                            ->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip','property_description.desc_lot','property_address.prop_unitno','desc_year','desc_parking')
                            ->where('user_id',Auth::id())
                            ->where('main_properties.prop_id',$propertyID);
        $property_list = $property_list_query->first();
        $type_data = PropertyTypeModel::select('title','s_code')->where("key",$type)->first();
        $countryList = DB::table('rk_countries')->get();
        // Property Address
        $PropertyAddress =  PropertyAddress::where('prop_id',$propertyID)->first();
        $PropertyDescription =  PropertyDescription::where('prop_id',$propertyID)->first();
        // dd($propertyID);
        return view('dashboard.editproperty.edit-description')->with(
            ['propertyID' => $propertyID,
            'MainProperty'=> $property_list,
            'PropertyAddress'=> $PropertyAddress,
            'PropertyDescription'=> $PropertyDescription,
            'type'=> $type,
            'category'=> $type_data,
            'countryList'=> $countryList,
        ]);
    }
    public function edit_worksheet($type, $propertyID)
    {
        $propertyID = base64_decode($propertyID);
        // make sure the property belong to auth user
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->back();
        }
        // get itemized paid amount
        $ItemPaidAmount = ItemPaidAmount::where('prop_id', '=', $propertyID)->get();
        $ItemPurchaseCost = ItemPurchaseCost::where('prop_id', '=', $propertyID)->get();
        $ItemPropertyLoan = PropertyLoan::where('property_id', '=', $propertyID)->get();
        $type_data = PropertyTypeModel::select('title','s_code')->where("key",$type)->first();

        //finance coust html
        $refinanceCostData = RefinanceCost($MainProperty);
        MainProperty::where('prop_id', $propertyID)->update(['prop_refinance_cost' => $refinanceCostData['TotalAmount']]);
        $view = (string)view('dashboard.refinace_cash_out.refinance_cost.refinance_cost_items',['MainProperty' => $MainProperty]);


        // Positions and improvements
        $ItemExtraCharge = ItemExtraCharge::where('prop_id', '=', $propertyID)->get();
        $ItemConvDeed = ItemConvDeed::where('prop_id', '=', $propertyID)->get();
        $ItemHoldingCost = ItemHoldingCost::where('prop_id', '=', $propertyID)->get();
        $ItemImprovementCost = ItemImprovementCost::where('prop_id', '=', $propertyID)->get();

        // rentout-operate
        $ItemPaidAmount = ItemOtherIncome::where('prop_id', '=', $propertyID)->get(); // get itemized paid amount
        $ItemPurchaseCost = ItemOperativeExpense::where('prop_id', '=', $propertyID)->get(); // get itemized paid amount

        // refinance-cashout
        $ItemRefinanceAmount = PropertyRefinance::where('property_id', '=', $propertyID)->first(); // get itemized paid amount
        $ItemRefinanceCost = ItemRefinanceCost::where('prop_id', '=', $propertyID)->get(); // get itemized paid amount


        $viewdata = []; // Initialize the array
        $viewdata['propertyID'] = $propertyID;
        $viewdata['ItemPropertyLoan'] = $ItemPropertyLoan;
        $viewdata['type'] = $type;
        $viewdata['category'] = $type_data;
        $viewdata['view'] = $view;

        // Positions and improvements
        $viewdata['ItemExtraCharge'] = $ItemExtraCharge;
        $viewdata['ItemConvDeed'] = $ItemConvDeed;
        $viewdata['ItemHoldingCost'] = $ItemHoldingCost;
        $viewdata['ItemImprovementCost'] = $ItemImprovementCost;

        // rentout-operate
        $viewdata['ItemPaidAmount'] = $ItemPaidAmount;
        $viewdata['ItemPurchaseCost'] = $ItemPurchaseCost;

        // refinance-cashout
        $viewdata['ItemRefinanceAmount'] = $ItemRefinanceAmount;
        $viewdata['ItemRefinanceCost'] = $ItemRefinanceCost;

        $viewdata['MainProperty'] = $MainProperty;
        return view('dashboard.editproperty.edit-worksheet')->with($viewdata);
    }
    public function update_property_description(Request $request)
    {
        // dd($request->input('ptype'));
        $propertyID = $request->input('propertyID');
        $prop_name = $request->input('property_tags');
        $prop_description = $request->input('property_description');
        $prop_tags = $request->input('property_tags');
        $propertyImagesVideos = $request->input('propertyImagesVideos');
        $request->validate([
            'file', // Confirm the upload is a file before checking its type.
            function ($attribute, $value, $fail) {
                $is_image = Validator::make(
                    ['upload' => $value],
                    ['upload' => 'image']
                )->passes();

                $is_video = Validator::make(
                    ['upload' => $value],
                    ['upload' => 'mimetypes:video/avi,video/mpeg,video/quicktime']
                )->passes();

                if (!$is_video && !$is_image) {
                    $fail(':attribute must be image or video.');
                }

                if ($is_video) {
                    $validator = Validator::make(
                        ['video' => $value],
                        ['video' => "max:102400"]
                    );
                    if ($validator->fails()) {
                        $fail(":attribute must be 10 megabytes or less.");
                    }
                }

                if ($is_image) {
                    $validator = Validator::make(
                        ['image' => $value],
                        ['image' => "max:102400"]
                    );
                    if ($validator->fails()) {
                        $fail(":attribute must be 10 megabytes or less.");
                    }
                }
            }
        ]);

        if($request->hasfile('file'))
        {
            foreach($request->file('file') as $imageVideo)
            {
                $name = time() . '-' . $imageVideo->getClientOriginalName();
                $imageVideo->move(public_path().'/uploads/property/', $name);
                $data[] = 'uploads/property/' . $name;
            }
            $propImageVideo = implode(',', $data);
        }
        if($propertyID){
            $MainProperty = MainProperty::find($propertyID);

        }else{
            $MainProperty = new MainProperty();
        }
            $MainProperty->user_id = Auth::id();
            $MainProperty->prop_name = $request->input('property_name');
            $MainProperty->prop_description = $request->input('property_description');
            $MainProperty->prop_tags = $request->input('property_tags');
            $MainProperty->prop_type = $request->input('prop_type');
            $MainProperty->prop_parent_type = $request->input('prop_parent_type');
            $MainProperty->prop_notes = $request->input('notes');
            if(isset($propImageVideo)){
                $MainProperty->imageVideo = $propImageVideo;
            }
            $MainProperty->created_at = now();
            $MainProperty->updated_at = now();
            $MainProperty->save();
            $propertyID = $MainProperty->prop_id;
        if(isset($propImageVideo)){
            $MainProperty = MainProperty::where('prop_id', $propertyID)->update(['imageVideo' => $propertyImagesVideos . ',' . $propImageVideo]);
        }

        // save address of property
        if($propertyID){
            $PropertyAddress = PropertyAddress::where('prop_id', '=', $propertyID)
            ->update(['prop_street' => $request->input('street'),
                    'prop_city' => $request->input('city'),
                    'prop_state' => $request->input('state'),
                    'prop_zip' => $request->input('zip'),
                    'prop_unitno' => $request->input('unit_number'),
                    'prop_tower_no' => $request->input('tower_number'),
                    'prop_project_name' => $request->input('project_name'),
                    'prop_building_name' => $request->input('building_name'),
                    'prop_country' => $request->input('pcountry'),
                    'prop_google_location' => $request->input('plocationlink'),
                    'updated_at' => now()]);
        } else{
            $PropertyAddress = new PropertyAddress;
            $PropertyAddress->prop_id = $MainProperty->id;
            $PropertyAddress->prop_street = $request->input('street');
            $PropertyAddress->prop_city = $request->input('city');
            $PropertyAddress->prop_state = $request->input('state');
            $PropertyAddress->prop_zip = $request->input('zip');

            $PropertyAddress->prop_unitno = $request->input('unit_number');
            $PropertyAddress->prop_tower_no = $request->input('tower_number');
            $PropertyAddress->prop_project_name = $request->input('project_name');
            $PropertyAddress->prop_building_name = $request->input('building_name');
            $PropertyAddress->prop_country = $request->input('pcountry');
            $PropertyAddress->prop_google_location = $request->input('plocationlink');


            $PropertyAddress->created_at = now();
            $PropertyAddress->updated_at = now();
            $PropertyAddress->save();
        }

        // save address of property
        if(!is_null($propertyID)){
            $PropertyDescription = PropertyDescription::where('prop_id', $propertyID)->first();
        }else{
            $PropertyDescription = new PropertyDescription();
        }
            $PropertyDescription->prop_id = $propertyID;
            $PropertyDescription->desc_type = $request->input('ptype');
            $PropertyDescription->bathrooms = $request->input('bathrooms');
            $PropertyDescription->bedrooms = $request->input('bedrooms');
            $PropertyDescription->desc_year = $request->input('year');
            $PropertyDescription->desc_parking = $request->input('parking');
            $PropertyDescription->desc_lot = $request->input('lot');
            $PropertyDescription->desc_zoning = $request->input('zoning');
            $PropertyDescription->desc_mlsn = $request->input('mlsn');
            $PropertyDescription->desc_transaction = $request->input('ptransactiontype');
            $PropertyDescription->desc_status = $request->input('pstatus');
            $PropertyDescription->desc_category_type = $request->input('pcategorytype');
            $PropertyDescription->desc_lot_type = $request->input('psizetype');
            $PropertyDescription->desc_category = $request->input('pcategory');
            $PropertyDescription->save();
        Session::flash('success','Property '. $request->input('property_name') . ' Updated Successfully');
        return redirect()->route('property.summary', ['category' => str_replace('_', '-', $request->input('prop_parent_type')),'id' => base64_encode($propertyID)]);
    }
    public function update_worksheet(Request $request){
        // dd($request->all());
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where(['prop_id'=> $propertyID,'user_id'=>$userid])->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->back();
        }
        if(!empty($request->input('loan_label'))){

            PropertyLoan::where('property_id', '=', $propertyID)->delete();
            $counts = count($request->input('loan_label'));
            for($i=0;$i<$counts;$i++){
                $ItemPaidAmount = new PropertyLoan;
                $ItemPaidAmount->property_id = $propertyID;
                $ItemPaidAmount->loan_label = $_POST['loan_label'][$i];
                $ItemPaidAmount->financingof = $_POST['financingof'][$i];
                $ItemPaidAmount->price_financing = $_POST['price_financing'][$i];

                $ItemPaidAmount->loan_type = $_POST['loan_type'][$i+1];
                $ItemPaidAmount->interest_rate = $_POST['interest_rate'][$i];
                $ItemPaidAmount->loan_term = $_POST['loan_term'][$i];
                if(isset($_POST['mortgage_insurance'][$i])){
                    $ItemPaidAmount->mortgage_insurance = $_POST['mortgage_insurance'][$i] && $_POST['mortgage_insurance'][$i]=='on' ? 1 : 0;
                }else{
                    $ItemPaidAmount->mortgage_insurance = 0;
                }

                // $ItemPaidAmount->recurring = $_POST['recurring'][$i];
                // $ItemPaidAmount->upfront = $_POST['upfront'][$i];
                $ItemPaidAmount->created_at = now();
                $ItemPaidAmount->updated_at = now();

                $saved = $ItemPaidAmount->save();
            }
        }

        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->update(
            [
            'prop_dateOfBooking' => $request->input('DateOfBooking'),
            'prop_emi_cost_rate'    => $request->input('emi_cost_rate'),
            'prop_purchasePrice' => $request->input('basicPurchasePrice'),
            'prop_paidAmount' => $request->input('actualPaidAmount'),
            'prop_salePrice' => $request->input('basicSalePrice'),
            'prop_costPercent' => $request->input('closingCostEstimatePercent'),
            'prop_sale_discount' => $request->input('prop_sale_discount'),
            'updated_at' => now()
        ]);


        Session::flash('success','Property '. $request->input('property_name') . ' Updated Successfully');
        return redirect()->route('property.summary', ['category' => str_replace('_', '-', $request->input('prop_parent_type')),'id' => base64_encode($propertyID)]);
    }

    public function book_finance_payment($propertyID)
    {
        $propertyID = base64_decode($propertyID);
        // make sure the property belong to auth user
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }
        // get itemized paid amount
        $ItemPaidAmount = ItemPaidAmount::where('prop_id', '=', $propertyID)->get();
        // get itemized paid amount
        $ItemPurchaseCost = ItemPurchaseCost::where('prop_id', '=', $propertyID)->get();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        $ItemPropertyLoan = PropertyLoan::where('property_id', '=', $propertyID)->get();
        // Session::flash('success','Property PropertyNameeee Added Successfully, Keep Going');
        
        // get itemizex refinance costs
        $itemRefinanceCost = ItemRefinanceCost::where('prop_id', '=', $propertyID)->get();
        
        return view('dashboard.book-finance-payment')->with(
            ['propertyID' => $propertyID,
            'ItemPaidAmount' => $ItemPaidAmount,
            'ItemPurchaseCost'=> $ItemPurchaseCost,
            'ItemPropertyLoan'=> $ItemPropertyLoan,
            'itemRefinanceCost' => $itemRefinanceCost,
            'MainProperty' => $MainProperty]);
    }
    
    public function possession_improvement($propertyID)
    {
        $propertyID = base64_decode($propertyID);
        // make sure the property belong to auth user
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }

        // get itemized paid amount
        $ItemExtraCharge = ItemExtraCharge::where('prop_id', '=', $propertyID)->get();
        // $ItemImprovementCost = ItemImprovementCost::where('prop_id', '=', $propertyID)->get();
        $ItemConvDeed = ItemConvDeed::where('prop_id', '=', $propertyID)->get();
        $ItemHoldingCost = ItemHoldingCost::where('prop_id', '=', $propertyID)->get();

        return view('dashboard.possession-improvement')->with(['propertyID' => $propertyID,
                                                            'ItemExtraCharge' => $ItemExtraCharge,
                                                            // 'ItemImprovementCost' => $ItemImprovementCost,
                                                            'ItemConvDeed' => $ItemConvDeed,
                                                            'ItemHoldingCost' => $ItemHoldingCost,
                                                            'MainProperty' => $MainProperty]);
    }

    public function addPropertyType1Book6($propertyID)
    {
        $propertyID = base64_decode($propertyID);

        // make sure the property belong to auth user
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }

        // get itemized paid amount
        $itemSellingCost = itemSellingCost::where('prop_id', '=', $propertyID)->get();
        $sellingCostData = SellingCosts($MainProperty);

        $Itemmiscellaneous_charges = ItemServicesMisclaniousCost::where('prop_id', '=', $propertyID)->get();

        // Session::flash('success','Property PropertyNameeee Added Successfully, Keep Going');
        return view('dashboard.projection-sale')->with(['propertyID' => $propertyID,
                                                            'itemSellingCost' => $itemSellingCost,
                                                            'MainProperty' => $MainProperty,
                                                            'sellingCostData' => $sellingCostData,
                                                            'Itemmiscellaneous_charges' => $Itemmiscellaneous_charges
                                                        ]);
    }

    public function rentout_operate($propertyID)
    {
        $propertyID = base64_decode($propertyID);

        // make sure the property belong to auth user
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }

        // get itemized paid amount
        $ItemPaidAmount = ItemOtherIncome::where('prop_id', '=', $propertyID)->get();
        // get itemized paid amount
        $ItemPurchaseCost = ItemOperativeExpense::where('prop_id', '=', $propertyID)->get();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;

        // Session::flash('success','Property PropertyNameeee Added Successfully, Keep Going');
        return view('dashboard.rentout-operate')->with(['propertyID' => $propertyID,
                                                            'ItemPaidAmount' => $ItemPaidAmount,
                                                            'ItemPurchaseCost'=> $ItemPurchaseCost,
                                                            'MainProperty' => $MainProperty]);
    }

    public function addPropertyType1Book5($propertyID)
    {
        $propertyID = base64_decode($propertyID);
        // dd($propertyID);

        // make sure the property belong to auth user
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }

        // get itemized paid amount
        $ItemPaidAmount = PropertyRefinance::where('property_id', '=', $propertyID)->first();
        // get itemized paid amount
        $itemRefinanceCost = ItemRefinanceCost::where('prop_id', '=', $propertyID)->get();
       //echo "<pre>".print_r($ItemPaidAmount, true);die;
       
        // get total loan amount
        $totalLoanAmount = calculateLoanAmount($MainProperty);

        // Session::flash('success','Property PropertyNameeee Added Successfully, Keep Going');
        return view('dashboard.addPropertyType1Book5')
            ->with(['propertyID' => $propertyID,
            'ItemPaidAmount' => $ItemPaidAmount,
            'itemRefinanceCost'=> $itemRefinanceCost,
            'MainProperty' => $MainProperty,
            'totalLoanAmount' => $totalLoanAmount
        ]);
    }

}