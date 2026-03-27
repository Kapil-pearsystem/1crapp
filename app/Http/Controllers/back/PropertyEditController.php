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


class PropertyEditController extends Controller
{
     function __construct()
  {

    $this->currency= '₹';
    $this->authid = Auth::id();
  }

    public function property_list($type)
    {
         $property_type =  config('app.property_type.'.$type);
         $usertags = UserTag::where('user_id',$this->authid)->orWhereNull('user_id')->get();
        $property_list = MainProperty::where('user_id',Auth::id())->where('prop_parent_type',$type)->where('is_archived',0)->orderBy("prop_id")->get();
        return view('front.property-list', compact('property_list','type','property_type','usertags'));
    } 
    public function addNewProperty($type)
    {
        //$property_list = Property::orderBy("id")->get();
        $property_type =  config('app.property_type.'.$type);
        return view('dashboard.addNewProperty', compact('property_type','type'));
    }

    

    public function property_filter_data()
    {
        // $property_list = Property::orderBy("id")->get();
        // return view('front.property-list', compact('property_list'));
    }
    public function getPropertyCriteria(Request $request)
    {
        $id = $request->input('id');
        $property_list = Property::where("id", $id)->get();
        foreach ($property_list as $list) {
            $html = '<div class="table-responsive">
                    <table class="table table-bordered mb-0" style="font-size:12px;">
                        <tbody>
                            <tr>
                                <td class="p-0" style="border:none;">
                                    <table class="table mb-0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="border-right:none; border-top:none; border-left:none; border-right:1px solid #ddd; text-align:center; font-weight:600;">
                                                    Property</td>
                                            </tr>
                                            <tr>
                                                <td style="border-left: none; text-align:center; font-weight:600;">
                                                    Purchase
                                                    Criteria</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="p-0" style="border:none;">
                                    <table class="table mb-0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="border-right:none;  border-top:none; border-left:none; border-bottom:none; text-align:center; font-weight:600;">Your Asset`s Performance</td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom:1px solid #ddd; border-left: none;text-align:center; font-weight:600;">Requirment</td>
                                                <td style="border-bottom:1px solid #ddd; border-right:none;text-align:center; font-weight:600;">Actual</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td align="center" valign="middle" style="text-align:center; font-weight:600;">Criteria
                                    Status
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="p-0" colspan="4" style="border:none;">
                                    <table class="table mb-0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td width="29.2%"
                                                    style="border-left:none; border-top:none; border-bottom:1px solid #ddd;">
                                                    Basic Purchase Price - BPP</td>
                                                <td width="41.6%" class="p-0" colspan="2" style="border:none;">
                                                    <table class="table mb-0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border:none; border-bottom:1px solid #ddd;">
                                                                    ' . $list['basic_purchase_price_requirement'] . '
                                                                </td>
                                                                <td
                                                                    style="border:none; border-left:#ddd solid 1px; border-bottom:1px solid #ddd;">
                                                                    ' . $list['basic_purchase_price_actual'] . '</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="24.7%" style="border:none; border-left:1px solid #ddd;">
                                                    <span id="iconns"><i class="fa fa-times rd_tik"></i></span> Meeting
                                                </td>
                                                <td style="border:none; border-left:1px solid #ddd;">
                                                    <span class="sucal_qess"
                                                        tooltip="No Action Needed DoingGreat ! keep it up ! Show this message in pop up. this message should be."
                                                        flow="left"> !</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-0" colspan="4" style="border:none;">
                                    <table class="table mb-0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td width="29.2%"
                                                    style="border-left:none; border-top:none; border-bottom:none;">Total
                                                    cash
                                                    Needed </td>
                                                <td width="41.6%" class="p-0" colspan="2" style="border:none;">
                                                    <table class="table mb-0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="border:none; border-bottom:1px solid #ddd;">
                                                                   ' . $list['total_cash_needed_requirement'] . '
                                                                </td>
                                                                <td
                                                                    style="border:none; border-left:#ddd solid 1px; border-bottom:1px solid #ddd;">
                                                                    ' . $list['total_cash_needed_actual'] . '</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="24.7%" style=" border-left:1px solid #ddd;">
                                                    <span id="iconns"><i class="fa fa-check gr_tik"></i> </span> Not
                                                    Meeting
                                                </td>
                                                <td
                                                    style="border:none; border-left:1px solid #ddd; border-top:1px solid #ddd;">
                                                    <span class="sucal_qess"
                                                        tooltip="Watch This short Video for Help ! Show this message in pop up. this message should be dynamic. because i"
                                                        flow="left"> !</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr><td class="p-0" colspan="4" style="border:none;"><table class="table mb-0" cellpadding="0" cellspacing="0"><tbody><tr>
                                                <td width="29.2%" style="border-bottom:none; border-left:none;">Total Cash Invested</td>
                                                <td width="41.6%" class="p-0" colspan="2" style="border:none;">
                                                <table class="table mb-0" cellpadding="0" cellspacing="0"><tbody><tr><td style="border:none;">' . $list['total_cash_invested_requirement'] . '</td><td style="border:none; border-left:#ddd solid 1px;">' . $list['total_cash_invested_actual'] . '</td></tr></tbody></table>
                                                </td><td width="24.7%" style="border-top: none; border-bottom: none;"><span id="iconns"><i class="fa fa-times rd_tik"></i></span> Meeting
                                                </td><td style="border:none; border-left:1px solid #ddd; border-top:1px solid #ddd;"><span class="sucal_qess" tooltip="No Action Needed DoingGreat ! keep it up ! Show this message in pop up. this message should be."flow="left"> !</span></td></tr></tbody></table></td>
                                                </tr></tbody></table></div>';
        }
        echo $html;
        // return view('front.property-list', compact('property_list'));
    }
    public function getPropertyList(Request $request)
    {
        $html = '';
        $title = $request->input('title');
        $prop_type = $request->input('prop_type');
        $prop_parent_type = $request->input('prop_parent_type');
        if (!empty($title)) {
            // Property::where('title', 'like', "%$title%");
            // Property::where('property_type', 'like', "%$title%");
            $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')->leftjoin('rk_states','property_address.prop_state','rk_states.id')->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip')->where('user_id',Auth::id())->where('prop_parent_type',$prop_parent_type)->where('prop_name', 'like', "%$title%")->where('is_archived',0);
            if(request('tags')){
                $tags = $request->input('tags');
                $property_list_query->where('prop_tags', 'like', "%$tags%");
            }

            if(request('sortby')){
                $sortby = $request->input('sortby');
                $property_list_query->orderBy($sortby);
            }else{
                $property_list_query->orderBy('prop_name');
            }

            

            $property_list = $property_list_query->groupBy('main_properties.prop_id')->get();
        } else {
            $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')->leftjoin('rk_states','property_address.prop_state','rk_states.id')->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip')->where('user_id',Auth::id())->where('prop_parent_type',$prop_parent_type)->where('is_archived',0);
              if(request('tags')){
                $tags = $request->input('tags');
                $property_list_query->where('prop_tags', 'like', "%$tags%");
            }

            if(request('sortby')){
                $sortby = $request->input('sortby');
                $property_list_query->orderBy($sortby);
            }else{
                $property_list_query->orderBy('prop_name');
            }


            $property_list = $property_list_query->get();
        }

        $html = '<div class="list-no-results text-center padding-t-20" style="width: 100%;padding-top: 120px;">No properties match your search.</div>';
        if(count($property_list)){
            $html = '';
        }
        foreach ($property_list as $list) {
                    $imgurl = url('img/property-placeholder.png');
                 if(isset($MainProperty->imageVideo)){ 
                                                $imageideos = explode(',', $MainProperty->imageVideo);
                                                if(count($imageideos)>0){
                                                        $imgurl= url('img') . '/' . $imageideos[0];
                                                }
                    }  
                    $propAddress = '';
                   // $propAddress = PropertyAddress::where('prop_id',$list['prop_id'])->first();
                    if($list['prop_street']){
                        $propAddress.= $list['prop_street']; 
                    }
                     if($list['prop_add_city']){
                        $propAddress.= ', '.$list['prop_add_city']; 
                    }
                     if($list['prop_add_state']){
                        $propAddress.= ', '.$list['prop_add_state']; 
                    }
                     if($list['prop_zip']){
                        $propAddress.= ', '.$list['prop_zip']; 
                    } 

            $html .= '  <div class="col-lg-4">
                        <div class="list_box_area">
                            <div class="img_area">
                                <div class="ovr_bstss">
                                    <div class="und_tkss">
                                        <a href="javascript:void(0);"><i class="fa fa-check-circle"></i></a>
                                    </div>
                                </div>

                                <img src="' . $imgurl . '" alt="" />
                            </div>
                            <div class="ic_area">
                                <div class="croosss" onclick="purchase_criteria(' . $list['prop_id'] . ')"
                                    data-toggle="modal" data-target="#purchase_criteria">
                                    <i class="fa fa-times"></i>
                                </div>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-share"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" title="Archive this property" onclick="archiveProperty('.$list["prop_id"].')"><i class="fa fa-cloud-download"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="deleteProperty('.$list["prop_id"].')"><i class="fa fa-trash"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="cnt_boxxs">
                                <h4>'. $list['prop_name']. '</h4>
                                <p>' . $propAddress . '</p>
                                <span>Purchase Price :'.$this->currency.' '.number_format($list['prop_purchasePrice']).'</span>
                                <p style="color: #7e7777;">'.$list['prop_tags'].'</p>
                              
                            </div>
                        </div>
                    </div>';
        }
        echo $html;
        // return view('front.property-list', compact('property_list'));
    }

      public function getArchivePropertyList(Request $request)
    {
        $html = '';
        $title = $request->input('title');
        $prop_type = $request->input('prop_type');
        $prop_parent_type = $request->input('prop_parent_type');
        $currency = $this->currency;
        if (!empty($title)) {
            // Property::where('title', 'like', "%$title%");
            // Property::where('property_type', 'like', "%$title%");
            $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')->leftjoin('rk_states','property_address.prop_state','rk_states.id')->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip')->where('user_id',Auth::id())->where('prop_parent_type',$prop_parent_type)->where('prop_name', 'like', "%$title%")->where('is_archived',1);
            if(request('tags')){
                $tags = $request->input('tags');
                $property_list_query->where('prop_tags', 'like', "%$tags%");
            }

            if(request('sortby')){
                $sortby = $request->input('sortby');
                $property_list_query->orderBy($sortby);
            }else{
                $property_list_query->orderBy('prop_name');
            }

            

            $property_list = $property_list_query->groupBy('main_properties.prop_id')->get();
        } else {
            $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')->leftjoin('rk_states','property_address.prop_state','rk_states.id')->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip')->where('user_id',Auth::id())->where('prop_parent_type',$prop_parent_type)->where('is_archived',1);
              if(request('tags')){
                $tags = $request->input('tags');
                $property_list_query->where('prop_tags', 'like', "%$tags%");
            }

            if(request('sortby')){
                $sortby = $request->input('sortby');
                $property_list_query->orderBy($sortby);
            }else{
                $property_list_query->orderBy('prop_name');
            }


            $property_list = $property_list_query->get();
        }

     
        //echo $html;
         return view('front.archive-property-list', compact('property_list','currency'));
    }
    
    public function addPropertyType1()
    {
        $countryList = DB::table('rk_countries')->get();
        return view('dashboard.addPropertyType1',compact('countryList'));
    }
    
    public function savePropertyType1(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $prop_name = $request->input('property_tags');
        $prop_description = $request->input('property_description');
        $prop_tags = $request->input('property_tags');
        
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
        // echo "<pre>".print_r($propImageVideo, true);die;
        
        // save main property fields
        $MainProperty = new MainProperty;
        $MainProperty->user_id = Auth::id();
        $MainProperty->prop_name = $request->input('property_name');
        $MainProperty->prop_description = $request->input('property_description');
        $MainProperty->prop_tags = $request->input('property_tags');
        $MainProperty->prop_type = 'Buy and Sell';
        $MainProperty->prop_notes = $request->input('notes');
        
        if(isset($propImageVideo)){
            $MainProperty->imageVideo = $propImageVideo;
        }
        
        $MainProperty->created_at = now();
        $MainProperty->updated_at = now();
        $MainProperty->save();
        // echo "<pre>".print_r($MainProperty->id, true);die;
        
        // save address of property
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
        
        // save address of property
        $PropertyDescription = new PropertyDescription;
        $PropertyDescription->prop_id = $MainProperty->id;
        $PropertyDescription->desc_type = $request->input('ptype');
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
        
       
        
        $PropertyDescription->created_at = now();
        $PropertyDescription->updated_at = now();
        $PropertyDescription->save();
        
        Session::flash('success','Property '. $request->input('property_name') . ' Added Successfully, Keep Going'); 
        return redirect()->route('addPropertyType1Book2', ['propertyID' => base64_encode($MainProperty->id)]);
    }
    
    public function getPropertyType1Count()
    {
        $MainProperty = MainProperty::where('user_id', Auth::id())->get();
        $MainPropertyCount = $MainProperty->count();
        
        return $MainPropertyCount;
    }
    
    public function addPropertyType1Book2($propertyID)
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
        
        // Session::flash('success','Property PropertyNameeee Added Successfully, Keep Going'); 
        return view('dashboard.addPropertyType1Book2')->with(['propertyID' => $propertyID,
                                                            'ItemPaidAmount' => $ItemPaidAmount,
                                                            'ItemPurchaseCost'=> $ItemPurchaseCost,
                                                            'MainProperty' => $MainProperty]);
    }
    
    public function savePropertyType1BuyPreHold(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        
        // save main property fields
        // $MainProperty->prop_purchasePrice = $request->input('basicPurchasePrice');
        // $MainProperty->prop_paidAmount = $request->input('actualPaidAmount');
        // $MainProperty->prop_salePrice = $request->input('basicSalePrice');
        // $MainProperty->prop_costPercent = $request->input('closingCostEstimatePercent');
        // $MainProperty->updated_at = now();
        // $MainProperty->save();
        // echo "<pre>".print_r($MainProperty, true);die;
        // print_r($_POST);die;
        if(!empty($request->input('loan_label'))){
            $counts = count($request->input('loan_label'));
            for($i=0;$i<$counts;$i++){
                $ItemPaidAmount = new PropertyLoan;
                $ItemPaidAmount->property_id = $propertyID;
                $ItemPaidAmount->loan_label = $_POST['loan_label'][$i];
                $ItemPaidAmount->financingof = $_POST['financingof'][$i];
                $ItemPaidAmount->price_financing = $_POST['price_financing'][$i];
               
                $ItemPaidAmount->loan_type = $_POST['loan_type'][$i];
                $ItemPaidAmount->interest_rate = $_POST['interest_rate'][$i];
                $ItemPaidAmount->loan_term = $_POST['loan_term'][$i];
                $ItemPaidAmount->mortgage_insurance = $_POST['mortgage_insurance'][$i] && $_POST['mortgage_insurance'][$i]=='on' ? 1 : 0;
                $ItemPaidAmount->recurring = $_POST['recurring'][$i];
                $ItemPaidAmount->upfront = $_POST['upfront'][$i];
                $ItemPaidAmount->created_at = now();
                $ItemPaidAmount->updated_at = now();
                $saved = $ItemPaidAmount->save();
            }
        }
        
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)
                                    ->where('user_id', '=', $userid)
                                    ->update(['prop_purchasePrice' => $request->input('basicPurchasePrice'),
                                            'prop_paidAmount' => $request->input('actualPaidAmount'),
                                            'prop_salePrice' => $request->input('basicSalePrice'),
                                            'prop_costPercent' => $request->input('closingCostEstimatePercent'),
                                            'updated_at' => now()]);
        
        
        Session::flash('success','Financial and Payment Information Updated For Your Property, Only 2 More Steps Left'); 
        return redirect()->route('addPropertyType1Book3', ['propertyID' => base64_encode($propertyID)]);
    }
    
    public function addItemizedPaidAmount(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = new ItemPaidAmount;
        $ItemPaidAmount->prop_id = $request->input('itemizedPaidAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPaidAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPaidAmtType');
        if($request->input('itemizedPaidAmtType') == 'percent'){
            $ItemPaidAmount->paid_amount = $request->input('itemizedPaidAmtPercent');
        }
        else{
            $ItemPaidAmount->paid_amount = $request->input('itemizedPaidAmtAmount');
        }
        $ItemPaidAmount->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
        $ItemPaidAmount->paid_date = $request->input('itemizedPaidAmtDate');
        $ItemPaidAmount->paid_remarks = $request->input('itemizedPaidAmtRemark');
        $ItemPaidAmount->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
        $ItemPaidAmount->created_at = now();
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        
        $editFun = "editIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."','".$ItemPaidAmount->paid_date."','".$ItemPaidAmount->paid_remarks."',".$ItemPaidAmount->paid_inLoan.");";
        $deleteFun = "deleteIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function EditItemizedPaidAmount(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = ItemPaidAmount::where('id', '=', $request->input('itemizedPaidAmtID'))->first();
        $oldAmt = $ItemPaidAmount->paid_amount;
        
        $ItemPaidAmount->prop_id = $request->input('itemizedPaidAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPaidAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPaidAmtType');
        if($request->input('itemizedPaidAmtType') == 'percent'){
            $ItemPaidAmount->paid_amount = $request->input('itemizedPaidAmtPercent');
        }
        else{
            $ItemPaidAmount->paid_amount = $request->input('itemizedPaidAmtAmount');
        }
        $ItemPaidAmount->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
        $ItemPaidAmount->paid_date = $request->input('itemizedPaidAmtDate');
        $ItemPaidAmount->paid_remarks = $request->input('itemizedPaidAmtRemark');
        $ItemPaidAmount->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        $newAmt = $ItemPaidAmount->paid_amount;
        $editFun = "editIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."','".$ItemPaidAmount->paid_date."','".$ItemPaidAmount->paid_remarks."',".$ItemPaidAmount->paid_inLoan.");";
        $deleteFun = "deleteIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'oldAmt' => $oldAmt,
                'newAmt' => $newAmt,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function EditPaidAmountMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        
        $saved = MainProperty::where('prop_id', '=', $propertyID)
                            ->where('user_id', '=', $userid)
                            ->update(['prop_paidAmount' => $request->input('paidAmt'),
                                    'updated_at' => now()]);
        
        if($saved){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function deletePaidAmountMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }

        $id = $request->input('id');
        $res=ItemPaidAmount::where('id',$id)->delete();
        
        if($res){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
       public function getStateByCountry($id)
    {
        $stateList = DB::table('rk_states')->where('country_id',$id)->get();
        $optionset = '<option value="">N/A</option>';
        foreach($stateList as $list){
            $optionset.= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        return $optionset;
    }
    
       public function getCityByState($id)
    {
        $stateList = DB::table('rk_cities')->where('state_id',$id)->get();
        $optionset = '<option value="">N/A</option>';
        foreach($stateList as $list){
            $optionset.= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        return $optionset;
    }
    
     public function getLoanBLock($id)
    {
         
        return view('dashboard.addLoanBlock', compact('id'));
    }
    
     public function addItemizedPurchasedAmount(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = new ItemPurchaseCost;
        $ItemPaidAmount->prop_id = $request->input('itemizedPurchasedAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPurchasedAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPurchasedAmtType');
        if($request->input('itemizedPurchasedAmtType') == 'percent'){
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtPercent');
        }
        else{
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtAmount');
        }
        $ItemPaidAmount->paid_percentOf = $request->input('itemizedPurchasedAmtPercentOf');
        $ItemPaidAmount->paid_date = $request->input('itemizedPurchasedAmtDate');
        $ItemPaidAmount->paid_remarks = $request->input('itemizedPurchasedAmtRemark');
        $ItemPaidAmount->paid_inLoan = $request->input('itemizedPurchasedAmtInLoan');
        $ItemPaidAmount->created_at = now();
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        
        $editFun = "editIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."','".$ItemPaidAmount->paid_date."','".$ItemPaidAmount->paid_remarks."',".$ItemPaidAmount->paid_inLoan.");";
        $deleteFun = "deleteIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function EditItemizedPurchasedAmount(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = ItemPurchaseCost::where('id', '=', $request->input('itemizedPurchasedAmtID'))->first();
        $oldAmt = $ItemPaidAmount->paid_amount;
        
        $ItemPaidAmount->prop_id = $request->input('itemizedPurchasedAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPurchasedAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPurchasedAmtType');
        if($request->input('itemizedPurchasedAmtType') == 'percent'){
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtPercent');
        }
        else{
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtAmount');
        }
        $ItemPaidAmount->paid_percentOf = $request->input('itemizedPurchasedAmtPercentOf');
        $ItemPaidAmount->paid_date = $request->input('itemizedPurchasedAmtDate');
        $ItemPaidAmount->paid_remarks = $request->input('itemizedPurchasedAmtRemark');
        $ItemPaidAmount->paid_inLoan = $request->input('itemizedPurchasedAmtInLoan');
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        $newAmt = $ItemPaidAmount->paid_amount;
        $editFun = "editIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."','".$ItemPaidAmount->paid_date."','".$ItemPaidAmount->paid_remarks."',".$ItemPaidAmount->paid_inLoan.");";
        $deleteFun = "deleteIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'oldAmt' => $oldAmt,
                'newAmt' => $newAmt,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
      public function EditPurchasedAmountMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        
        $saved = MainProperty::where('prop_id', '=', $propertyID)
                            ->where('user_id', '=', $userid)
                            ->update(['prop_costPercent' => $request->input('paidAmt'),'prop_costPurchasePrice' => $request->input('prop_costPurchasePrice'),
                                    'updated_at' => now()]);
        
        if($saved){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
   
    public function deletePurchasedAmountMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }

        $id = $request->input('id');
        $res=ItemPurchaseCost::where('id',$id)->delete();
        
        if($res){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
     
    public function addPropertyType1Book3($propertyID)
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
        
        // Session::flash('success','Property PropertyNameeee Added Successfully, Keep Going'); 
        return view('dashboard.addPropertyType1Book3')->with(['propertyID' => $propertyID,
                                                            'ItemExtraCharge' => $ItemExtraCharge,
                                                            'MainProperty' => $MainProperty]);
    }

     public function addPropertyType1Book4($propertyID)
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
        return view('dashboard.addPropertyType1Book4')->with(['propertyID' => $propertyID,
                                                            'ItemPaidAmount' => $ItemPaidAmount,
                                                            'ItemPurchaseCost'=> $ItemPurchaseCost,
                                                            'MainProperty' => $MainProperty]);
    }


       public function addItemizedOtherIncome(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = new ItemOtherIncome;
        $ItemPaidAmount->prop_id = $request->input('itemizedPaidAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPaidAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPaidAmtType');
        $ItemPaidAmount->paid_amount = $request->input('itemizedPaidAmtAmount');
       
         $ItemPaidAmount->created_at = now();
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        
        $editFun = "editIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.");";
        $deleteFun = "deleteIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function EditItemizedOtherIncome(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = ItemOtherIncome::where('id', '=', $request->input('itemizedPaidAmtID'))->first();
        $oldAmt = $ItemPaidAmount->paid_amount;
        $oldAmtType = $ItemPaidAmount->paid_type;
        
        $ItemPaidAmount->prop_id = $request->input('itemizedPaidAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPaidAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPaidAmtType');
        $ItemPaidAmount->paid_amount = $request->input('itemizedPaidAmtAmount');
        
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        $newAmt = $ItemPaidAmount->paid_amount;
        $editFun = "editIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.");";
        $deleteFun = "deleteIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'oldAmt' => $oldAmt,
                'oldAmtType' => $oldAmtType,
                'newAmt' => $newAmt,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function EditOtherIncomeMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        
        $saved = MainProperty::where('prop_id', '=', $propertyID)
                            ->where('user_id', '=', $userid)
                            ->update(['other_income_price' => $request->input('paidAmt'),
                                    'updated_at' => now()]);
        
        if($saved){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function deleteOtherIncomeMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }

        $id = $request->input('id');
        $res=ItemOtherIncome::where('id',$id)->delete();
        
        if($res){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    

       public function addItemizedOperativeExpense(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = new ItemOperativeExpense;
        $ItemPaidAmount->prop_id = $request->input('itemizedPurchasedAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPurchasedAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPurchasedAmtType');
         if($request->input('itemizedPurchasedAmtType') == 'percent'){
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtPercent');
        }
        else{
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtAmount');
        }
        $ItemPaidAmount->paid_infuture = $request->input('itemizedFutureExpense');
        $ItemPaidAmount->paid_aftervacancy = $request->input('itemizedAfterVacancy');
        $ItemPaidAmount->paid_of = $request->input('itemizedPurchasedAmtOf');
        $ItemPaidAmount->paid_percentOf = $request->input('itemizedPurchasedAmtPercentOf');
       
        $ItemPaidAmount->created_at = now();
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        
          $editFun = "editIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."',".$ItemPaidAmount->paid_infuture."',".$ItemPaidAmount->paid_aftervacancy."','".$ItemPaidAmount->paid_of."'');";
        $deleteFun = "deleteIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function EditItemizedOperativeExpense(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = ItemOperativeExpense::where('id', '=', $request->input('itemizedPurchasedAmtID'))->first();
        $oldAmt = $ItemPaidAmount->paid_amount;
        $oldAmtType = $ItemPaidAmount->paid_type;
        
        $ItemPaidAmount->prop_id = $request->input('itemizedPurchasedAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPurchasedAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPurchasedAmtType'); 

          if($request->input('itemizedPurchasedAmtType') == 'percent'){
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtPercent');
        }
        else{
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtAmount');
        }

        $ItemPaidAmount->paid_infuture = $request->input('itemizedFutureExpense');
        $ItemPaidAmount->paid_aftervacancy = $request->input('itemizedAfterVacancy');
        $ItemPaidAmount->paid_of = $request->input('itemizedPurchasedAmtOf');
        $ItemPaidAmount->paid_percentOf = $request->input('itemizedPurchasedAmtPercentOf');
        
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        $newAmt = $ItemPaidAmount->paid_amount;
       $editFun = "editIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."',".$ItemPaidAmount->paid_infuture."',".$ItemPaidAmount->paid_aftervacancy."','".$ItemPaidAmount->paid_of."');";
        $deleteFun = "deleteIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'oldAmt' => $oldAmt,
                'oldAmtType' => $oldAmtType,
                'newAmt' => $newAmt,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function EditOperativeExpenseMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        
        $dataset = array();
        $dataset['updated_at'] = now();

        if(request('paidAmt')){
            $dataset['operating_expense_percent'] = $request->input('paidAmt');
        }
        if(request('prop_costPurchasePrice')){
            $dataset['operating_expense_price'] = $request->input('prop_costPurchasePrice');
        }
        if(request('RentoutDate')){
            $dataset['date_of_rentout'] = $request->input('RentoutDate');
        }
        if(request('GrossRent')){
            $dataset['grossrent'] = $request->input('GrossRent');
        }
        if(request('GrossrentType')){
            $dataset['grossrent_type'] = $request->input('GrossrentType');
        }
        if(request('vacancyRate')){
            $dataset['vacancy_rate'] = $request->input('vacancyRate');
        }

        
        $saved = MainProperty::where('prop_id', '=', $propertyID)
                            ->where('user_id', '=', $userid)
                            ->update($dataset);
        
        if($saved){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function deleteOperativeExpenseMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }

        $id = $request->input('id');
        $res=ItemOperativeExpense::where('id',$id)->delete();
        
        if($res){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }

      public function savePropertyType1RentOutOperate(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        
     
       if($MainProperty->prop_type=='Buy And Hold'){
             Session::flash('success','Rental And Operative Information Updated For Your Property, 1 More Step To Go'); 
            return redirect()->route('addPropertyType1Book6', ['propertyID' => base64_encode($propertyID)]);
       
        }else {
            Session::flash('success','Rental And Operative Information Updated For Your Property, 2 More Step To Go'); 
            return redirect()->route('addPropertyType1Book5', ['propertyID' => base64_encode($propertyID)]);
        }

    }
    

     public function addPropertyType1Book5($propertyID)
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
        $ItemPaidAmount = PropertyRefinance::where('property_id', '=', $propertyID)->first();
        // get itemized paid amount
        $ItemPurchaseCost = ItemRefinanceCost::where('prop_id', '=', $propertyID)->get();
       //echo "<pre>".print_r($ItemPaidAmount, true);die;
        
        // Session::flash('success','Property PropertyNameeee Added Successfully, Keep Going'); 
        return view('dashboard.addPropertyType1Book5')->with(['propertyID' => $propertyID,
                                                            'ItemPaidAmount' => $ItemPaidAmount,
                                                            'ItemPurchaseCost'=> $ItemPurchaseCost,
                                                            'MainProperty' => $MainProperty]);
    }
    
    public function savePropertyType1ReFinancingCost(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        
       
        if(!empty($request->input('loan_label'))){
            
                $ItemPaidAmount = new PropertyRefinance;
                $ItemPaidAmount->property_id = $propertyID;
                $ItemPaidAmount->loan_label = $_POST['loan_label'];
                $ItemPaidAmount->financingof = $_POST['financingof'];
                $ItemPaidAmount->price_financing = $_POST['price_financing'];
               
                $ItemPaidAmount->loan_type = $_POST['loan_type'];
                $ItemPaidAmount->interest_rate = $_POST['interest_rate'];
                $ItemPaidAmount->loan_term = $_POST['loan_term'];
                $ItemPaidAmount->mortgage_insurance = $_POST['mortgage_insurance'] && $_POST['mortgage_insurance']=='on' ? 1 : 0;
                $ItemPaidAmount->recurring = $_POST['recurring'];
                $ItemPaidAmount->upfront = $_POST['upfront'];
                $ItemPaidAmount->refinance_after = $_POST['refinance_after'];
                $ItemPaidAmount->created_at = now(); 
                $ItemPaidAmount->updated_at = now();
                $saved = $ItemPaidAmount->save();
            
        }
        
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)
                                    ->where('user_id', '=', $userid)
                                    ->update(['date_of_refinance'=>$request->input('date_of_refinance'),'prop_refinance_cost' => $request->input('totalPurchasedAmountInput2'),'prop_refinance_percent' => $request->input('closingCostEstimatePercent'),
                                            'updated_at' => now()]);
        
        
        Session::flash('success','Re-Financial and Cash Out Information Updated For Your Property, Only 1 More Steps Left'); 
        return redirect()->route('addPropertyType1Book6', ['propertyID' => base64_encode($propertyID)]);
    }

      public function addItemizedReFinancingCost(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = new ItemRefinanceCost;
        $ItemPaidAmount->prop_id = $request->input('itemizedPurchasedAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPurchasedAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPurchasedAmtType');
        if($request->input('itemizedPurchasedAmtType') == 'percent'){
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtPercent');
        }
        else{
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtAmount');
        }
        $ItemPaidAmount->paid_percentOf = $request->input('itemizedPurchasedAmtPercentOf');
        $ItemPaidAmount->paid_date = $request->input('itemizedPurchasedAmtDate');
        $ItemPaidAmount->paid_remarks = $request->input('itemizedPurchasedAmtRemark');
        $ItemPaidAmount->paid_inLoan = $request->input('itemizedPurchasedAmtInLoan');
        $ItemPaidAmount->created_at = now();
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        
        $editFun = "editIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."','".$ItemPaidAmount->paid_date."','".$ItemPaidAmount->paid_remarks."',".$ItemPaidAmount->paid_inLoan.");";
        $deleteFun = "deleteIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function EditItemizedReFinancingCost(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = ItemRefinanceCost::where('id', '=', $request->input('itemizedPurchasedAmtID'))->first();
        $oldAmt = $ItemPaidAmount->paid_amount;
        
        $ItemPaidAmount->prop_id = $request->input('itemizedPurchasedAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPurchasedAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPurchasedAmtType');
        if($request->input('itemizedPurchasedAmtType') == 'percent'){
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtPercent');
        }
        else{
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtAmount');
        }
        $ItemPaidAmount->paid_percentOf = $request->input('itemizedPurchasedAmtPercentOf');
        $ItemPaidAmount->paid_date = $request->input('itemizedPurchasedAmtDate');
        $ItemPaidAmount->paid_remarks = $request->input('itemizedPurchasedAmtRemark');
        $ItemPaidAmount->paid_inLoan = $request->input('itemizedPurchasedAmtInLoan');
        $ItemPaidAmount->updated_at = now();
        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
        $newAmt = $ItemPaidAmount->paid_amount;
        $editFun = "editIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."','".$ItemPaidAmount->paid_date."','".$ItemPaidAmount->paid_remarks."',".$ItemPaidAmount->paid_inLoan.");";
        $deleteFun = "deleteIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'oldAmt' => $oldAmt,
                'newAmt' => $newAmt,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
      public function EditReFinancingCostMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        
        $saved = MainProperty::where('prop_id', '=', $propertyID)
                            ->where('user_id', '=', $userid)
                            ->update(['prop_refinance_percent' => $request->input('paidAmt'),'prop_refinance_cost' => $request->input('prop_costPurchasePrice'),
                                    'updated_at' => now()]);
        
        if($saved){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
   
    public function deleteReFinancingCostMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }

        $id = $request->input('id');
        $res=ItemRefinanceCost::where('id',$id)->delete();
        
        if($res){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }


    public function addContractInitialData(Request $request)
    {
        
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $prop_name = $request->input('prop_name');
        $prop_type = $request->input('prop_type'); 
        $dealer_purchase_price = $request->input('dealer_purchase_price');
        $dealer_closing_cost = $request->input('dealer_closing_cost');
        $dealer_closing_cost_percent = $request->input('dealer_closing_cost_percent');
        $dealer_closing_cost_type = $request->input('dealer_closing_cost_type');
        if($dealer_closing_cost_type=='amount'){
            $dealer_closing_cost_percent = 0;
        }else{
            $dealer_closing_cost = 0;
        }

        $MainProperty = New MainProperty;

        $MainProperty->user_id = $userid;
        $MainProperty->prop_name = $prop_name;
        $MainProperty->prop_type = $prop_type;
        $MainProperty->prop_parent_type = 'contract_and_sell';
        $MainProperty->dealer_purchase_price = $dealer_purchase_price;
        $MainProperty->dealer_closing_cost = $dealer_closing_cost;
        $MainProperty->dealer_closing_cost_percent = $dealer_closing_cost_percent;
        $MainProperty->dealer_closing_cost_type = $dealer_closing_cost_type;
        $MainProperty->save();
         
        $propertyID = $MainProperty->id;
        Session::flash('success','Initial Data Added For Your Property'); 
        return redirect()->route('addPropertyType1', ['propertyID' => base64_encode($propertyID)]);

        
      /*  if($res){
            return response()->json([
                'success' => true], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }*/
    }


     public function deleteProperty(Request $request)
    {
        $propertyID = $request->input('prop_deleteid');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        $property_parent_type = $MainProperty->prop_parent_type;
        $res=MainProperty::where('prop_id',$propertyID)->delete();
        
       Session::flash('success','Property Deleted Successfully!'); 
        return redirect()->route('property-list', [$property_parent_type]);
    }

    

     public function archiveProperty(Request $request)
    {
        $propertyID = $request->input('prop_id');
        $status = $request->input('status');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request'); 
            return redirect()->route('home');
        }
        $property_parent_type = $MainProperty->prop_parent_type;
        $res=MainProperty::where('prop_id',$propertyID)->update(['is_archived'=>$status]);
        
        if($status==1){
            Session::flash('success','Property Archived Successfully!'); 
        }else{
            Session::flash('success','Property Restored Successfully!'); 
        }
       
        return redirect()->route('property-list', [$property_parent_type]);
    }



    

}