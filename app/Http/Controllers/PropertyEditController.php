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
use App\Models\itemConvDeed;
use App\Models\TagModel;
use App\Models\ItemServicesMisclaniousCost;
use App\Models\MasterCritria;
use App\Models\PropertyTypeModel;
use App\Models\PropertyGalleryModel;
use App\Models\Subscription;
use App\Models\ItemfinanceCost;


class PropertyEditController extends Controller
{
    function __construct()
    {

        $this->currency= '₹';
        $this->authid = Auth::id();
    }

    public function property_list($type)
    {
        // dd($type); die;
        $type_data = PropertyTypeModel::select('title')->where("key",$type)->first();
        $property_type =  $type_data->title??config('app.property_type.'.$type);
        // dd($property_type);
        $usertags = UserTag::where('user_id',$this->authid)->orWhereNull('user_id')->get();
        $property_list = MainProperty::where('user_id',Auth::id())->where('prop_parent_type',$type)->where('is_archived',0)->orderBy("prop_id")->get();
    //    dd($type);

        return view('front.property-list', compact('property_list','type','property_type','usertags'));
    }

    public function addNewProperty($type)
    {
        $type_data = PropertyTypeModel::select('title')->where("key",$type)->first();
        $property_type =  $type_data->title;
        return view('dashboard.addNewProperty', compact('property_type','type'));
    }
    public function new_property(Request $request){
        $type = $request->session()->get('prop_cat')??'buy-sale';
        // dd($type);
        $type_data = PropertyTypeModel::select('title')->where("key",$type)->first();
        $property_type =  $type_data->title;
        // dd($property_type); die;
        return view('dashboard.addNewProperty', compact('property_type','type'));
    }
    function set_cat_session(Request $request){
        $request->validate([
            'prop_cat' => 'required|string|max:255',
        ]);
        if ($request->session()->has('prop_cat')) {
            $request->session()->forget('prop_cat');
        }
        $request->session()->put('prop_cat', $request->prop_cat);
        return response()->json(['status' => true]);
    }
    public function getLastSlug()
    {
        $previousUrl = url()->previous();
        $path = parse_url($previousUrl, PHP_URL_PATH);
        $segments = explode('/', trim($path, '/'));
        $secondLastSlug = count($segments) > 1 ? $segments[count($segments) - 2] : null;
        return $secondLastSlug;
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
        // $prop_type = $request->input('prop_type');
        $prop_parent_type = $request->input('prop_parent_type');
        if (!empty($title)) {
            // Property::where('title', 'like', "%$title%");
            // Property::where('property_type', 'like', "%$title%");
            $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')
            ->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')
            ->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')
            ->leftjoin('rk_states','property_address.prop_state','rk_states.id')
            ->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip')
            ->where('user_id',Auth::id())->where('prop_parent_type',$prop_parent_type)
            ->where('prop_name', 'like', "%$title%")->where('is_archived',0);
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
            $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')
            ->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')
            ->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')
            ->leftjoin('rk_states','property_address.prop_state','rk_states.id')
            ->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip')
            ->where('user_id',Auth::id())->where('prop_parent_type',$prop_parent_type)->where('is_archived',0);
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
                                    <a href="javascript:void(0);" title="Archive this property" onclick="archiveProperty(' . $list['prop_id'] . ')"><i class="fa fa-cloud-download"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="deleteProperty(' . $list['prop_id'] . ')"><i class="fa fa-trash"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="cnt_boxxs">
                            <h4>
                                <a href="' . route('property.summary', [
                                    'category' => str_replace('_', '-', $list['prop_parent_type']),
                                    'id' => base64_encode($list['prop_id'])
                                ]) . '">' . htmlspecialchars($list['prop_name']) . '</a>
                            </h4>
                            <p>' . htmlspecialchars($propAddress) . '</p>
                            <span>Purchase Price: ' . $this->currency . ' ' . number_format($list['prop_purchasePrice']) . '</span>
                            <p style="color: #7e7777;">' . htmlspecialchars($list['prop_tags']) . '</p>
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

    // public function addPropertyType1()
    // {
    //     $countryList = DB::table('rk_countries')->get();
    //     return view('dashboard.addPropertyType1',compact('countryList'));
    // }
    public function add_description(Request $request, $propertyID=NULL)
    {
        $type = $request->session()->get('prop_cat')??'buy-sale';
        $tags = TagModel::select('name')->where("status", 1)->get()->pluck('name')->toArray();
        $tagatorAutocomplete = "['" . implode("','", $tags) . "']";
        $category = PropertyTypeModel::select('title','s_code')->where("key",$type)->first();
        $property_type =  $category->title;
        $Propertyvideos =  array();
        $Propertyresource =  array();
        $countryList = DB::table('rk_countries')->get();
        $pagedata = array();
        $pagedata['countryList'] = $countryList;
        $pagedata['type'] = $type;
        $pagedata['property_type'] = $property_type;
        $pagedata['category'] = $category;
        $pagedata['tagatorAutocomplete'] = $tagatorAutocomplete;
        if($propertyID){
            $propertyID = base64_decode($propertyID);
            $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')
                                ->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')
                                ->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')
                                ->leftjoin('rk_states','property_address.prop_state','rk_states.id')
                                ->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip','property_description.desc_lot','property_address.prop_unitno','desc_year','desc_parking')
                                ->where('user_id',Auth::id())
                                ->where('main_properties.prop_id',$propertyID);
            $property_list = $property_list_query->first();
            // Property Address
            $PropertyAddress =  PropertyAddress::where('prop_id',$propertyID)->first();
            // dd($PropertyAddress);
            $PropertyDescription =  PropertyDescription::where('prop_id',$propertyID)->first();
            $Propertyvideos =  PropertyGalleryModel::where(['category'=>2, 'prop_id'=> $propertyID])->get();
            $Propertyresource =  PropertyGalleryModel::where(['category'=>3, 'prop_id'=> $propertyID])->get();
        }
        if($propertyID){
            $pagedata['propertyID'] = $propertyID;
            $pagedata['MainProperty'] = $property_list;
            $pagedata['PropertyAddress'] = $PropertyAddress;
            $pagedata['PropertyDescription'] = $PropertyDescription;
            $pagedata['Propertyvideos'] = $Propertyvideos;
            $pagedata['Propertyresource'] = $Propertyresource;
        }

        return view('dashboard.add-description')->with($pagedata);
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
        return redirect()->route('properties.new-property.possession-improvement', ['id' => base64_encode($propertyID)]);
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


    public function addItemizedOtherIncome(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = new ItemOtherIncome;
        $ItemPaidAmount->prop_id = $request->input('itemizedPaidAmtPropertyID');
        $ItemPaidAmount->paid_name = $request->input('itemizedPaidAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPaidAmtType');
        if($request->input('itemizedPaidAmtType') == 'percent'){
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtPercent');
            $ItemPaidAmount->paid_percentOf = $request->input('itemizedPurchasedAmtPercentOf');
        }else{
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtAmount');
            $ItemPaidAmount->paid_amountOf = $request->input('itemizedPurchasedAmtOf');
        }
        // dd($ItemPaidAmount->paid_amount);
        $ItemPaidAmount->itemizedFutureExpense = $request->input('itemizedFutureExpense');
        $ItemPaidAmount->itemizedAfterVacancy = $request->input('itemizedAfterVacancy');
        $ItemPaidAmount->created_at = now();
        $ItemPaidAmount->updated_at = now();

        $saved = $ItemPaidAmount->save();
        // echo "<pre>".print_r($ItemPaidAmount, true);die;
            
        // get the property associated with user auth check
        $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
        
        // calculate other income total
        $otherIncomeCalculation = OtherIncomes($MainProperty);

        $editFun = "editIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount."',".$ItemPaidAmount->itemizedFutureExpense."',".$ItemPaidAmount->itemizedAfterVacancy.");";
        $deleteFun = "deleteIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";
        // echo $editFun;die;

        // Fetch updated income items HTML
        $divText = $this->fetchIncomeItems($ItemPaidAmount->prop_id, $otherIncomeCalculation);
        
        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'newAmt' => $otherIncomeCalculation,
                'divText' => $divText,
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
        // Fetch the item record
        $ItemPaidAmount = ItemOtherIncome::find($request->input('itemizedPaidAmtID'));

        // Ensure the item exists
        if (!$ItemPaidAmount) {
            return response()->json(['success' => false, 'errors' => 'Item not found'], 404);
        }

        // Set properties from request
        $ItemPaidAmount->prop_id = $request->input('itemizedPaidAmtPropertyIDEdit');
        $ItemPaidAmount->paid_name = $request->input('itemizedPaidAmtName');
        $ItemPaidAmount->paid_type = $request->input('itemizedPaidAmtType');

        if ($request->input('itemizedPaidAmtType') == 'percent') {
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtPercent');
            $ItemPaidAmount->paid_percentOf = $request->input('itemizedPurchasedAmtPercentOf');
        } else {
            $ItemPaidAmount->paid_amount = $request->input('itemizedPurchasedAmtAmount');
            $ItemPaidAmount->paid_amountOf = $request->input('itemizedPurchasedAmtOf');
        }

        $ItemPaidAmount->itemizedFutureExpense = $request->input('itemizedFutureExpense');
        $ItemPaidAmount->itemizedAfterVacancy = $request->input('itemizedAfterVacancy');
        $ItemPaidAmount->updated_at = now();

        // Save item
        if ($ItemPaidAmount->save()) {
            $oldAmt = $ItemPaidAmount->paid_amount;
            $oldAmtType = $ItemPaidAmount->paid_type;
            
            // get the property associated with user auth check
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyIDEdit)->where('user_id',Auth::id())->first();
            
            // calculate other income total
            $otherIncomeCalculation = OtherIncomes($MainProperty);

            // Preparing JavaScript functions for client-side update
            $editFun = "editIPA({$ItemPaidAmount->id},{$ItemPaidAmount->prop_id},'{$ItemPaidAmount->paid_name}','{$ItemPaidAmount->paid_type}',{$ItemPaidAmount->paid_amount},{$ItemPaidAmount->itemizedFutureExpense},{$ItemPaidAmount->itemizedAfterVacancy});";
            $deleteFun = "deleteIPA({$ItemPaidAmount->id},{$ItemPaidAmount->paid_amount});";

            // Fetch updated income items HTML
            $divText = $this->fetchIncomeItems($ItemPaidAmount->prop_id, $otherIncomeCalculation);

            return response()->json([
                'success' => true,
                'divText' => $divText,
                'id' => $ItemPaidAmount->id,
                'oldAmt' => $oldAmt,
                'oldAmtType' => $oldAmtType,
                'newAmt' => $otherIncomeCalculation,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun
            ], 200);
        } else {
            return response()->json(['success' => false, 'errors' => 'Something went wrong'], 400);
        }
    }


    public function fetchIncomeItems($prop_id, $otherIncomeCalculation)
    {
        $items = ItemOtherIncome::where('prop_id', $prop_id)->get();
        $currencySymbol = '₹';
        return view('dashboard.rentout-operate.rentout-income-items', compact('items', 'currencySymbol', 'otherIncomeCalculation'))->render();
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
            
        // calculate other income total
        $otherIncomeCalculation = OtherIncomes($MainProperty);

        // Fetch updated income items HTML
        $divText = $this->fetchIncomeItems($propertyID, $otherIncomeCalculation);

        if($res){
            return response()->json([
                'success' => true,
                'divText' => $divText,
                'newAmt' => $otherIncomeCalculation], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }

    public function loadOtherIncomeItemized(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }
            
        // calculate other income total
        $otherIncomeCalculation = OtherIncomes($MainProperty);

        // Fetch updated income items HTML
        $divText = $this->fetchIncomeItems($propertyID, $otherIncomeCalculation);

        return response()->json([
            'success' => true,
            'divText' => $divText,
            'newAmt' => $otherIncomeCalculation], 200);
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
        
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $ItemPaidAmount->prop_id)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }
            
        // calculate other income total
        $operatingExpenseCalculation = OperatingExpense($MainProperty);

        // Fetch updated income items HTML
        $divText = $this->fetchOperatingExpenseItems($ItemPaidAmount->prop_id, $operatingExpenseCalculation);

        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'newAmt' => $operatingExpenseCalculation,
                'divText' => $divText,
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
        
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $ItemPaidAmount->prop_id)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }
            
        // calculate other income total
        $operatingExpenseCalculation = OperatingExpense($MainProperty);

        // Fetch updated income items HTML
        $divText = $this->fetchOperatingExpenseItems($ItemPaidAmount->prop_id, $operatingExpenseCalculation);

        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'oldAmt' => $oldAmt,
                'oldAmtType' => $oldAmtType,
                'newAmt' => $operatingExpenseCalculation,
                'divText' => $divText,
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
        
        // calculate other income total
        $operatingExpenseCalculation = OperatingExpense($MainProperty);

        // Fetch updated income items HTML
        $divText = $this->fetchOperatingExpenseItems($propertyID, $operatingExpenseCalculation);

        if($res){
            return response()->json([
                'success' => true,
                'newAmt' => $operatingExpenseCalculation,
                'divText' => $divText
            ], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }

    public function fetchOperatingExpenseItems($prop_id, $operatingExpenseCalculation)
    {
        $items = ItemOperativeExpense::where('prop_id', $prop_id)->get();
        $currencySymbol = '₹';
        return view('dashboard.rentout-operate.operating-expense-items', compact('items', 'currencySymbol', 'operatingExpenseCalculation'))->render();
    }

    public function loadOperatingExpenseItemized(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }
            
        // calculate operating expense total
        $operatingExpenseCalculation = OperatingExpense($MainProperty);

        // Fetch updated income items HTML
        $divText = $this->fetchOperatingExpenseItems($propertyID, $operatingExpenseCalculation);

        return response()->json([
            'success' => true,
            'divText' => $divText,
            'newAmt' => $operatingExpenseCalculation
        ], 200);
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
        
        // update operating_expense_percent in main property
        MainProperty::where('prop_id', '=', $propertyID)
            ->where('user_id', '=', $userid)
            ->update([
                'operating_expense_percent' => $request->input('operating_expense_percent'),
                'operating_expense_price' => $request->input('operating_expense_price'),
                'other_income_price' => $request->input('totalOtherIncomeYearly'),
                'prop_HoldingCostPercent' => $request->input('totalHoldingCostPInput')
                ]);
        
        // check other income toggle
        if($request->input('otherIncomeitemizedToggle') != "on" && $request->input('totalOtherIncomeYearly')){
            // delete properties selling cost items
            ItemOtherIncome::where('prop_id', $propertyID)->delete();
        }
        
        // check holding cost toggle
        if($request->input('holdingCostitemizedToggle') != "on" && $request->input('totalHoldingCostPInput')){
            // delete properties selling cost items
            ItemHoldingCost::where('prop_id', $propertyID)->delete();
        }
        
        // check operating expense toggle
        if($request->input('operatingExpenseitemizedToggle') != "on" && $request->input('operating_expense_percent')){
            // delete properties selling cost items
            ItemOperativeExpense::where('prop_id', $propertyID)->delete();
        }


        if ($request->filled('redirect_back_edit_url')) {
            Session::flash('success','Rentout and Operate Information Updated Successfully!');
            return redirect()->route($request->input('redirect_back_edit_url'), ['id' => base64_encode($propertyID)]);
        } else {
           if($MainProperty->prop_type=='Buy And Hold'){
                 Session::flash('success','Rental And Operative Information Updated For Your Property, 1 More Step To Go');
                return redirect()->route('addPropertyType1Book6', ['propertyID' => base64_encode($propertyID)]);
    
            }else {
                Session::flash('success','Rental And Operative Information Updated For Your Property, 2 More Step To Go');
                return redirect()->route('addPropertyType1Book5', ['propertyID' => base64_encode($propertyID)]);
            }
        }

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

    public function savePropertyType1ReFinancingCost(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }
        $propertyRefinance = PropertyRefinance::where('property_id',$propertyID)->first();
        if(is_null($propertyRefinance)){
            $propertyRefinance = new PropertyRefinance;
        }
        if(!empty($request->input('loan_label')) && isset($_POST['loan_type']) && isset($_POST['financingof'])){
            $propertyRefinance->property_id = $propertyID;
            $propertyRefinance->loan_label = $_POST['loan_label'];
            // $propertyRefinance->financingof = $_POST['financingof'];
            // $propertyRefinance->price_financing = $_POST['price_financing'];
                
            $financing = $_POST['financingof'];
            
            if ($financing === 'Custom Amount') {
                $price_financing = $_POST['custom_amount'];
            }
            else {
                $price_financing = $_POST['price_financing'];
            }
            
            $propertyRefinance->financingof = $financing;
            $propertyRefinance->price_financing = $price_financing;

            $propertyRefinance->loan_type = $_POST['loan_type'];
            $propertyRefinance->interest_rate = $_POST['interest_rate'];
            $propertyRefinance->loan_term = $_POST['loan_term'];
            if(isset($request->mortgage_insurance)){
                $propertyRefinance->mortgage_insurance = $_POST['mortgage_insurance'] && $_POST['mortgage_insurance']=='on' ? 1 : 0;
            }else{
                $propertyRefinance->mortgage_insurance = 0;
            }

            $propertyRefinance->recurring = $_POST['recurring'] ?? null;
            $propertyRefinance->upfront = $_POST['upfront'] ?? null;
            $propertyRefinance->refinance_after = $_POST['refinance_after'];
            $propertyRefinance->created_at = now();
            $propertyRefinance->updated_at = now();
            $saved = $propertyRefinance->save();
        }
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)
                                    ->where('user_id', '=', $userid)
                                    ->update([
                                        'date_of_refinance'=>$request->input('date_of_refinance'),
                                        'prop_refinance_cost' => $request->input('totalPurchasedAmountInput2'),
                                        'prop_refinance_percent' => $request->input('prop_refinance_percent'),
                                        'updated_at' => now()]);

        // check refinace cost toggle
        if($request->input('refinaceCostitemizedToggle') != "on" && $request->input('prop_refinance_percent')){
            // delete properties selling cost items
            ItemRefinanceCost::where('prop_id', $propertyID)->delete();
        }


        if ($request->filled('redirect_back_edit_url')) {
            Session::flash('success','Refinance and CashOut Information Updated Successfully!');
            return redirect()->route($request->input('redirect_back_edit_url'), ['id' => base64_encode($propertyID)]);
        } else {
            Session::flash('success','Re-Financial and Cash Out Information Updated For Your Property, Only 1 More Steps Left');
            return redirect()->route('addPropertyType1Book6', ['propertyID' => base64_encode($propertyID)]);
        }
    }

    // ===================================        REFINANCE COST       ===================================
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

            /*$editFun = "editIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."','".$ItemPaidAmount->paid_date."','".$ItemPaidAmount->paid_remarks."',".$ItemPaidAmount->paid_inLoan.");";
            $deleteFun = "deleteIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";*/
            // echo $editFun;die;

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPurchasedAmtPropertyID)->where('user_id',Auth::id())->first();

            // get total loan amount
            $totalLoanAmount = $request->input('TotalLoanAmount');
            
            $refinanceCostData = RefinanceCost($MainProperty, $totalLoanAmount);
            
            MainProperty::where('prop_id',$request->itemizedPurchasedAmtPropertyID)->update(['prop_refinance_cost' => $refinanceCostData['TotalAmount']]);
            $view = (string)view('dashboard.refinace_cash_out.refinance_cost.refinance_cost_items',['MainProperty' => $MainProperty, 'ItemPurchaseCostData' => $refinanceCostData]);

            if($saved){
                return response()->json([
                    'success'     => true,
                    'view'        => $view,
                    'totalAmount' => $refinanceCostData['TotalAmount']
                    /*'id' => $ItemPaidAmount->id,
                    'editFun' => $editFun,
                    'deleteFun' => $deleteFun*/
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function getItemizedReFinancingCost(Request $request)
        {
            $property_id = $request->property_id;
            $MainProperty = MainProperty::where('prop_id', $property_id)->where('user_id',Auth::id())->first();
            
            // get total loan amount
            $totalLoanAmount = $request->input('TotalLoanAmount');
            
            $refinanceCostData = RefinanceCost($MainProperty, $totalLoanAmount);
            MainProperty::where('prop_id',$property_id)->update(['prop_refinance_cost' => $refinanceCostData['TotalAmount']]);
            $view = (string)view('dashboard.refinace_cash_out.refinance_cost.refinance_cost_items',['MainProperty' => $MainProperty, 'ItemPurchaseCostData' => $refinanceCostData]);

            if($view){
                return response()->json([
                    'success'     => true,
                    'view'        => $view,
                    'totalAmount' => $refinanceCostData['TotalAmount']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        
        public function getItemizedReFinancingCostStep5(Request $request)
        {
            $property_id = $request->property_id;
            $MainProperty = MainProperty::where('prop_id', $property_id)->where('user_id',Auth::id())->first();
            
            // get total loan amount
            $totalLoanAmount = calculateLoanAmount($MainProperty);
            
            $refinanceCostData = RefinanceCost($MainProperty, $totalLoanAmount);
            
            MainProperty::where('prop_id',$property_id)->update(['prop_refinance_cost' => $refinanceCostData['TotalAmount']]);
            
            $view = (string)view('dashboard.refinace_cash_out.refinance_cost.refinance_cost_items',['MainProperty' => $MainProperty, 'ItemPurchaseCostData' => $refinanceCostData]);

            if($view){
                return response()->json([
                    'success'     => true,
                    'view'        => $view,
                    'totalAmount' => $refinanceCostData['TotalAmount']
                ], 200);
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
        // Retrieve the record by ID
        $itemPaidAmount = ItemRefinanceCost::where('id', $request->input('itemizedfinanceCostAmtID'))->first();

        if (!$itemPaidAmount) {
            return response()->json([
                'success' => false,
                'errors' => 'Record not found',
            ], 404);
        }

        $oldAmt = $itemPaidAmount->paid_amount;

        // Update the record
        $itemPaidAmount->prop_id = $request->input('itemizedfinanceCostAmtPropertyID');
        $itemPaidAmount->paid_name = $request->input('itemizedfinanceCostAmtName');
        $itemPaidAmount->paid_type = $request->input('itemizedfinanceCostAmtType');

        if ($request->input('itemizedfinanceCostAmtType') == 'percent') {
            $itemPaidAmount->paid_amount = $request->input('itemizedfinanceCostAmtPercent');
        } else {
            $itemPaidAmount->paid_amount = $request->input('paid_amount'); // "paid_amount" is the field name in your form
        }

        $itemPaidAmount->paid_percentOf = $request->input('itemizedfinanceCostAmtPercentOf');
        $itemPaidAmount->paid_date = $request->input('itemizedfinanceCostAmtDate');
        $itemPaidAmount->paid_remarks = $request->input('itemizedfinanceCostAmtRemark');
        $itemPaidAmount->paid_inLoan = $request->input('itemizedfinanceCostAmtInLoan');
        $itemPaidAmount->updated_at = now();

        $saved = $itemPaidAmount->save();

        // Update related property refinance cost
        $mainProperty = MainProperty::where('prop_id', $request->input('itemizedfinanceCostAmtPropertyID'))
            ->where('user_id', Auth::id())
            ->first();

        // get total loan amount
        $totalLoanAmount = $request->input('TotalLoanAmount');
        
        $refinanceCostData = RefinanceCost($mainProperty, $totalLoanAmount);

        MainProperty::where('prop_id', $request->input('itemizedfinanceCostAmtPropertyID'))
            ->update(['prop_refinance_cost' => $refinanceCostData['TotalAmount']]);

        $view = (string)view('dashboard.refinace_cash_out.refinance_cost.refinance_cost_items', [
            'MainProperty' => $mainProperty,
            'ItemPurchaseCostData' => $refinanceCostData
        ]);

        if ($saved) {
            return response()->json([
                'success' => true,
                'view' => $view,
                'totalAmount' => $refinanceCostData['TotalAmount'],
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'errors' => 'Something went wrong',
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

            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();

            // get total loan amount
            $totalLoanAmount = $request->input('TotalLoanAmount');
            
            $refinanceCostData = RefinanceCost($MainProperty, $totalLoanAmount);
            
            MainProperty::where('prop_id',$request->propertyID)->update(['prop_refinance_cost' => $refinanceCostData['TotalAmount']]);
            $view = (string)view('dashboard.refinace_cash_out.refinance_cost.refinance_cost_items',['MainProperty' => $MainProperty, 'ItemPurchaseCostData' => $refinanceCostData]);

            if($res){
                return response()->json([
                    'success' => true,
                    'view'        => $view,
                    'totalAmount' => $refinanceCostData['TotalAmount']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        /*public function EditReFinancingCostMainProperty(Request $request)
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
        }*/
    // ===================================        REFINANCE COST       ===================================

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

    public function exportProperty(Request $request){

        $title = $request->input('title');
        $prop_type = $request->input('prop_type');
        $prop_parent_type = $request->input('prop_parent_type');
        if (!empty($title)) {
            // Property::where('title', 'like', "%$title%");
            // Property::where('property_type', 'like', "%$title%");
            $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')->leftjoin('rk_states','property_address.prop_state','rk_states.id')->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip','property_description.desc_lot','property_address.prop_unitno','desc_year','desc_parking')->where('user_id',Auth::id())->where('prop_parent_type',$prop_parent_type)->where('prop_name', 'like', "%$title%")->where('is_archived',0);
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


            $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')->leftjoin('rk_states','property_address.prop_state','rk_states.id')->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip','property_description.desc_lot','property_address.prop_unitno','desc_year','desc_parking')->where('user_id',Auth::id())->where('prop_parent_type',$prop_parent_type)->where('is_archived',0);
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

        $filename = 'Properties_list_' . time() . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // file creation
        $file = fopen('php://output', 'w');

        $header = array("Name","Street Address","City","State/Region","ZIP/Postal Code","Property Type","Unit/Space Number","Year Built","Parking","Lot Size (Sq.Ft.)","Purchase Price","After Repair Value","Loan Amount","Purchase Costs","Total Cash Needed","Gross Rent (Per Month)","Vacancy (%)","Operating Expenses (Per Month)","Net Operating Income (Per Month)","Loan Payments (Per Month)","Cash Flow (Per Month)","Cap Rate (Purchase Price, %)","Cap Rate (Market Value, %)","Cash on Cash Return (%)","Return on Equity (%)","Return on Investment (%)","Internal Rate of Return (%)","Rent to Value (%)","Description","Tags","Archived","Date Added","Date Last Updated");



        fputcsv($file, $header);
        $i = 1;
        foreach ($property_list as $row) {

            $loanAmount = 0;
            $property_loan_query = PropertyLoan::where('property_id',$row->prop_id)->get();
            if(count($property_loan_query)){
                foreach($property_loan_query as $listloan){
                    $loanAmount+= $row->prop_purchasePrice ? ($row->prop_purchasePrice * $listloan->price_financing / 100) : 0;
                }
            }

            $vacancy_rate_amount  = $row->vacancy_rate * $row->grossrent/100;
            $operating_income = $row->grossrent - $vacancy_rate_amount;
            $net_operating_income = $operating_income - $row->operating_expense_price;
            $Expdata1 = array(
                'prop_name' => $row->prop_name,
                'prop_street' => $row->prop_street,
                'prop_add_city' => $row->prop_add_city,
                'prop_add_state' => $row->prop_add_state,
                'prop_zip' => $row->prop_zip,
                'desc_category_type' => $row->desc_category_type,
                'prop_unitno' => $row->prop_unitno,
                'desc_year' => $row->desc_year,
                'desc_parking' => $row->desc_parking,
                'desc_lot' => $row->desc_lot,
                'prop_purchasePrice' => $row->prop_purchasePrice,
                'prop_salePrice' => $row->prop_salePrice,
                'loan_amount' => $loanAmount,
                'prop_costPurchasePrice' => $row->prop_costPurchasePrice,
                'cash_needed' => $row->prop_purchasePrice - $loanAmount,
                'grossrent' => $row->grossrent,
                'vacancy_rate' => $row->vacancy_rate,
                'operating_expense_price' => $row->operating_expense_price,
                'net_operating_income' => $net_operating_income,
                'laon_payment' => $loanAmount / 12,
                'cash_flow' => $net_operating_income - ($loanAmount / 12),
                'cap_rate_pr' => '',
                'cap_rate_mr' => '',
                'cash_on_cash_return' => '',
                'return_on_equity' => '',
                'return_on_investment' => '',
                'internal_rate_of_return' => '',
                'rent_of_value' => '',
                'description' => $row->prop_description,
                'tags' => $row->prop_tags,
                'archived' => $row->is_archived==1 ? 'Yes' : 'No',
                'date_added' => $row->created_at,
                'last_updated' => $row->updated_at,
            );

            fputcsv($file, $Expdata1);
        }
        fclose($file);
    }

    private function getEMICosts($propertyList,$loans){
        $loanAmount = 0;
        $EMIArray = array();
        if(!is_null($loans)){
            foreach($loans as $listloan){
                $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $listloan->price_financing / 100) : 0;
                if($listloan->financingof == 'Purchase Price'){
                    $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $listloan->price_financing / 100) : 0;
                }elseif($listloan->financingof == 'Improvement Cost'){
                    $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $propertyList->prop_improvementCostPercent / 100) : 0;
                }elseif($listloan->financingof == 'Price and Improvement Cost'){
                    $itemPurchaseCost = ItemPurchaseCost::where('prop_id',$propertyList->prop_id)->first();
                    // dd($itemPurchaseCost,$propertyList->prop_id);
                    if(!is_null($itemPurchaseCost)){
                        // dd($itemPurchaseCost->paid_amount);
                        $loanAmount = $itemPurchaseCost->paid_amount ? ($itemPurchaseCost->paid_amount * $propertyList->price_financing / 100) : 0;
                    }else{
                        $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $propertyList->price_financing / 100) : 0;
                    }
                    // dd($loanAmount);
                }elseif($listloan->financingof == 'Basic Sale Price'){
                    // prop_sellingCostPercent
                    $itemSellingCost = itemSellingCost::where('prop_id',$propertyList->prop_id)->first();
                    if(!is_null($itemSellingCost)){
                        $loanAmount = $itemSellingCost->paid_amount ? ($itemSellingCost->paid_amount * $propertyList->price_financing / 100) : 0;
                    }
                    $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $listloan->price_financing / 100) : 0;
                }

                $interestRatePerMonth = $listloan->interest_rate;
                $loanTimePeriodInYear = $listloan->loan_term;

                // one month interest
                $p = $loanAmount;
                $r = $interestRatePerMonth / (12 * 100);

                // one month period
                $t = $loanTimePeriodInYear * 12;

                $emi = ($p * $r * pow(1 + $r, $t)) / (pow(1 + $r, $t) - 1);
                $emi = number_format($emi, 0, '.');
                $emi = str_replace(',', '', $emi);
                $EMIArray[] = $emi;
            }
        }
        return $EMIArray;
    }

    /*private function getPaidAmountCosts($propertyList){
        $itemPaidAmount = ItemPaidAmount::where('prop_id',$propertyList->prop_id)->get();
        $itemPaidAmountTotal = 0;
        foreach($itemPaidAmount as $item){
            if($item->paid_type == 'amount'){
                $itemPaidAmountTotal += $item->paid_amount;
            }
            if($item->paid_type == 'percent'){
                if($item->paid_percentOf == 'price'){
                    $itemPaidAmountTotal += $item->paid_amount * $propertyList->prop_purchasePrice / 100;
                }
                else{
                    $itemPaidAmountTotal += $item->paid_amount * 0 / 100; // todo loan amount update
                }
            }
        }
        return $itemPaidAmountTotal;
    }

    private function getitemConvDeed($propertyList){
        $itemConvDeed = itemConvDeed::where('prop_id',$propertyList->prop_id)->get();
        $itemConvDeedAmount = 0;
        foreach($itemConvDeed as $item){
            if($item->paid_type == 'amount'){
                $itemConvDeedAmount += $item->paid_amount;
            }else{
                if($item->paid_percentOf == 'price'){
                    $itemConvDeedAmount += $item->paid_amount * $propertyList->prop_purchasePrice / 100;
                }
                else{
                    $itemConvDeedAmount += $item->paid_amount * 0 / 100; // todo loan amount update
                }
            }
        }
        return $itemConvDeedAmount;
    }*/

    private function getItemHoldingCost($propertyList){
        $itemHoldingCost = itemHoldingCost::where('prop_id',$propertyList->prop_id)->get();
        $itemHoldingAmount = 0;
        foreach($itemHoldingCost as $item){
            if($item->paid_type == 'amount'){
                $itemHoldingAmount += $item->paid_amount;
            }else{
                if($item->paid_percentOf == 'price'){
                    $itemHoldingAmount += $item->paid_amount * $propertyList->prop_purchasePrice / 100;
                }
                else{
                    $itemHoldingAmount += $item->paid_amount * 0 / 100; // todo loan amount update
                }
            }
        }
        return $itemHoldingAmount;
    }

    public function propertyAnalysis($propertyID)
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
        $propConvDeedPercent = $property_list->prop_ConvDeedPercent;

        $loanAmount = 0;
        $property_loan_query = PropertyLoan::where('property_id',$propertyID)->get();
        if(count($property_loan_query)){
            foreach($property_loan_query as $listloan){
                $loanAmount+= $property_list->prop_purchasePrice ? ($property_list->prop_purchasePrice * $listloan->price_financing / 100) : 0;
            }
        }

        /*$itemExtraCharge = itemExtraCharge::where('prop_id',$property_list->prop_id)->get();
        $itemExtraChargeSum = 0;
        foreach ($itemExtraCharge as $item) {
            $itemExtraChargeSum += $item->paid_amount;
        }*/
        $EMICosts = $this->getEMICosts($property_list,$property_loan_query);
        $EMICostsSum = 0;
        for ($i=0; $i < count($EMICosts); $i++) {
            $EMICostsSum += (int)$EMICosts[$i];
        }
        $vacancy_rate_amount  = $property_list->vacancy_rate * $property_list->grossrent/100;
        $operating_income = $property_list->grossrent - $vacancy_rate_amount;
        $net_operating_income = $operating_income - $property_list->operating_expense_price;

        $Expdata1 = array(
            'cash_needed' => $property_list->prop_purchasePrice - $loanAmount,
            'net_operating_income' => $net_operating_income,
            'loanAmount' => $loanAmount,
            'laon_payment' => $loanAmount / 12,
            'cash_flow' => $net_operating_income - ($loanAmount / 12),
            'vacancy_rate_amount' => $vacancy_rate_amount,
            'operating_income' => $operating_income,
            'cap_rate_pr' => '',
            'cap_rate_mr' => '',
            'cash_on_cash_return' => '',
            'return_on_equity' => '',
            'return_on_investment' => '',
            'internal_rate_of_return' => '',
            'rent_of_value' => ''
        );

        $ItemImprovementCost = ItemImprovementCost::where('prop_id', '=', $propertyID)->get();
        $FullImprovementCost = ItemImprovementCost::where('prop_id', '=', $propertyID)->sum('paid_amount');
        $ItemItemHoldingCost = ItemHoldingCost::where('prop_id', '=', $propertyID)->get();
        $FullItemHoldingCost = ItemHoldingCost::where('prop_id', '=', $propertyID)->sum('paid_amount');
        $PropertyLoan = PropertyLoan::where('property_id', '=', $propertyID)->get();
        $Expdata1['cash_needed'] =  $Expdata1['cash_needed'] + $FullImprovementCost + $FullItemHoldingCost;

        // $itemPaidAmount = $this->getPaidAmountCosts($property_list);
        // $itemConvDeedAmount = $this->getitemConvDeed($property_list);
        $itemHoldingCostAmount = $this->getItemHoldingCost($property_list);
        $itemExtraCharge = itemExtraCharge::where('prop_id',$propertyID)->get();
        $itemImprovementCost = itemImprovementCost::where('prop_id',$propertyID)->get();
        $itemHoldingCost = itemHoldingCost::where('prop_id',$propertyID)->get();
        $itemOperativeExpense = ItemOperativeExpense::where('prop_id',$propertyID)->get();
        $itemServicesMisclaniousCost = ItemServicesMisclaniousCost::where('prop_id',$propertyID)->get();
        // dd($itemServicesMisclaniousCost);
        $itemPaid = ItemPaidAmount::where('prop_id',$propertyID)->get();

        $purchaseCriterias = MasterCritria::where('type','Purchase Criterias')->get();
        $valuationCriterias = MasterCritria::where('type','Valuation Criterias')->get();
        $cashFlowCriterias = MasterCritria::where('type','Cash Flow Criterias')->get();
        $investmentReturnCriterias = MasterCritria::where('type','Investment Return Criterias')->get();
        $financialRatiosCriterias = MasterCritria::where('type','Financial Ratios Criterias')->get();
        $criteriasData = array(
            'purchaseCriterias'         => $purchaseCriterias,
            'valuationCriterias'        => $valuationCriterias,
            'cashFlowCriterias'         => $cashFlowCriterias,
            'investmentReturnCriterias' => $investmentReturnCriterias,
            'financialRatiosCriterias'  => $financialRatiosCriterias
        );
        // dd($purchaseCriterias,$valuationCriterias,$cashFlowCriterias,$investmentReturnCriterias,$financialRatiosCriterias);

        return view('dashboard.property-analysis')->with(
            ['propertyID' => $propertyID,
            'Expdata1' => $Expdata1,
            'MainProperty'=> $property_list,
            // 'FullImprovementCost'=> $FullImprovementCost,
            'ItemImprovementCost'=>$ItemImprovementCost,
            'ItemItemHoldingCost'=> $ItemItemHoldingCost,
            'FullItemHoldingCost'=>$FullItemHoldingCost,
            'PropertyLoan'=>$PropertyLoan,
            'EMICosts'      => $EMICosts,
            'EMICostsSum'   => $EMICostsSum,
            // 'itemExtraChargeSum' => $itemExtraChargeSum,
            'itemExtraCharge'=> $itemExtraCharge,
            // 'itemPaidAmount'    => $itemPaidAmount,
            // 'itemConvDeedAmount'=> $itemConvDeedAmount,
            'itemHoldingCostAmount'=>$itemHoldingCostAmount,
            'itemExtraCharge'    => $itemExtraCharge,
            'itemImprovementCost' => $itemImprovementCost,
            'itemHoldingCost'   => $itemHoldingCost,
            'itemOperativeExpense'=> $itemOperativeExpense,
            'itemServicesMisclaniousCost' => $itemServicesMisclaniousCost,
            'itemPaid'    => $itemPaid,
            'criteriasData'=> $criteriasData
        ]);

    }

    public function reports_and_sharing($category, $propertyID)
    {
        // dd($propertyID);
        $propertyID = base64_decode($propertyID);
        $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')
                            ->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')
                            ->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')
                            ->leftjoin('rk_states','property_address.prop_state','rk_states.id')
                            ->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip','property_description.desc_lot','property_address.prop_unitno','desc_year','desc_parking')
                            ->where('user_id',Auth::id())
                            ->where('main_properties.prop_id',$propertyID);
        $property_list = $property_list_query->first();
        // dd($property_list);
        return view('dashboard.reports-and-sharing')->with(
            ['propertyID' => $propertyID,
            'MainProperty'=> $property_list,
        ]);
    }
    public function property_reports($category, $propertyID)
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
        
        // to run reports from recent-sales-comp
        $MainProperty = $property_list;
        $userSubscription = Subscription::where('user_id',Auth::id())->orderBy('id','DESC')->first();

        $propertyList = new MainProperty();
        $propertyList = $propertyList->where('prop_dateOfSale','!=',NULL);
        $propertyList = $propertyList->whereNotIn('prop_id',[$propertyID]);
        $propertyList = $propertyList->get();
        $propertyList = $this->propertListCollect($propertyList,$MainProperty);
        $propertyListView = (string)view('rental-comps-rent.property_list',compact('propertyList','userSubscription'));

        $averageSalePriceSection = (string)view('rental-comps-rent.average-sale-price-section',compact('propertyList','MainProperty'));
        
        // dd($property_list);
         if($category == 'buy-sale'){
            return view('dashboard.reports.buy-sale-report')->with(['propertyID' => $propertyID, 'MainProperty'=> $property_list]);
        }else if($category == 'buy-hold'){
            return view('dashboard.reports.buy-hold-report')->with(['propertyID' => $propertyID, 'MainProperty'=> $property_list]);
        }else if($category == 'buy-refinance-hold'){
            return view('dashboard.reports.buy-refinance-hold-report')->with(['propertyID' => $propertyID, 'MainProperty'=> $property_list, 'propertyListView' => $propertyListView, 'averageSalePriceSection' => $averageSalePriceSection]);
        }else{
            return view('dashboard.reports.buy-refinance-sale-report')->with(['propertyID' => $propertyID, 'MainProperty'=> $property_list]);
        }
        return view('dashboard.property-report')->with(['propertyID' => $propertyID, 'MainProperty'=> $property_list,]);
    }
    public function property_termsheet($category, $propertyID)
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
        // dd($property_list);
        if($category == 'buy-sale'){
            return view('dashboard.term-sheet.buy-sale-termsheet')->with(['propertyID' => $propertyID, 'MainProperty'=> $property_list]);
        }else if($category == 'buy-hold'){
            return view('dashboard.term-sheet.buy-hold-termsheet')->with(['propertyID' => $propertyID, 'MainProperty'=> $property_list]);
        }else if($category == 'buy-refinance-hold'){
            return view('dashboard.term-sheet.buy-refinance-hold-termsheet')->with(['propertyID' => $propertyID, 'MainProperty'=> $property_list]);
        }else{
            return view('dashboard.term-sheet.buy-refinance-sale-termsheet')->with(['propertyID' => $propertyID, 'MainProperty'=> $property_list]);
        }
        
    }
    public function property_photos($category, $propertyID)
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
        // dd($property_list);
        return view('dashboard.property-photos')->with(
            ['propertyID' => $propertyID,
            'MainProperty'=> $property_list,
        ]);
    }
    public function property_map($category, $propertyID)
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
        // dd($property_list);
        return view('dashboard.property-map')->with(
            ['propertyID' => $propertyID,
            'MainProperty'=> $property_list,
        ]);
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

    // ===================================        FINANCE COST       ===================================
    public function addItemizedFinancingCost(Request $request)
    {
        // echo "<pre>".print_r($request->input(), true);die;
        $ItemPaidAmount = new ItemfinanceCost;
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

        /*$editFun = "editIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."','".$ItemPaidAmount->paid_date."','".$ItemPaidAmount->paid_remarks."',".$ItemPaidAmount->paid_inLoan.");";
        $deleteFun = "deleteIPURA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.");";*/
        // echo $editFun;die;

        $MainProperty = MainProperty::where('prop_id', $request->itemizedPurchasedAmtPropertyID)->where('user_id',Auth::id())->first();

        // get total loan amount
        $totalLoanAmount = $request->input('TotalLoanAmount');
        
        $financeCostData = financeCost($MainProperty, $totalLoanAmount);
        
        MainProperty::where('prop_id',$request->itemizedPurchasedAmtPropertyID)->update(['prop_finance_cost' => $financeCostData['TotalAmount']]);
        $view = (string)view('dashboard.finace_cash_out.finance_cost.finance_cost_items',['MainProperty' => $MainProperty, 'ItemPurchaseCostData' => $financeCostData]);

        if($saved){
            return response()->json([
                'success'     => true,
                'view'        => $view,
                'totalAmount' => $financeCostData['TotalAmount']
            ], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function getItemizedFinancingCost(Request $request)
    {
        $property_id = $request->property_id;
        $MainProperty = MainProperty::where('prop_id', $property_id)->where('user_id',Auth::id())->first();
        
        // get total loan amount
        $totalLoanAmount = $request->input('TotalLoanAmount');
        
        $financeCostData = financeCost($MainProperty, $totalLoanAmount);
        MainProperty::where('prop_id',$property_id)->update(['prop_finance_cost' => $financeCostData['TotalAmount']]);
        $view = (string)view('dashboard.finace_cash_out.finance_cost.finance_cost_items',['MainProperty' => $MainProperty, 'ItemPurchaseCostData' => $financeCostData]);

        if($view){
            return response()->json([
                'success'     => true,
                'view'        => $view,
                'totalAmount' => $financeCostData['TotalAmount']
            ], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
        
    public function EditItemizedFinancingCost(Request $request)
    {
        // Retrieve the record by ID
        $itemPaidAmount = ItemfinanceCost::where('id', $request->input('itemizedfinanceCostAmtID'))->first();

        if (!$itemPaidAmount) {
            return response()->json([
                'success' => false,
                'errors' => 'Record not found',
            ], 404);
        }

        $oldAmt = $itemPaidAmount->paid_amount;

        // Update the record
        $itemPaidAmount->prop_id = $request->input('itemizedfinanceCostAmtPropertyID');
        $itemPaidAmount->paid_name = $request->input('itemizedfinanceCostAmtName');
        $itemPaidAmount->paid_type = $request->input('itemizedfinanceCostAmtType');

        if ($request->input('itemizedfinanceCostAmtType') == 'percent') {
            $itemPaidAmount->paid_amount = $request->input('itemizedfinanceCostAmtPercent');
        } else {
            $itemPaidAmount->paid_amount = $request->input('paid_amount'); // "paid_amount" is the field name in your form
        }

        $itemPaidAmount->paid_percentOf = $request->input('itemizedfinanceCostAmtPercentOf');
        $itemPaidAmount->paid_date = $request->input('itemizedfinanceCostAmtDate');
        $itemPaidAmount->paid_remarks = $request->input('itemizedfinanceCostAmtRemark');
        $itemPaidAmount->paid_inLoan = $request->input('itemizedfinanceCostAmtInLoan');
        $itemPaidAmount->updated_at = now();

        $saved = $itemPaidAmount->save();

        // Update related property refinance cost
        $mainProperty = MainProperty::where('prop_id', $request->input('itemizedfinanceCostAmtPropertyID'))
            ->where('user_id', Auth::id())
            ->first();

        // get total loan amount
        $totalLoanAmount = $request->input('TotalLoanAmount');
        
        $financeCostData = financeCost($mainProperty, $totalLoanAmount);

        MainProperty::where('prop_id', $request->input('itemizedfinanceCostAmtPropertyID'))
            ->update(['prop_finance_cost' => $financeCostData['TotalAmount']]);

        $view = (string)view('dashboard.finace_cash_out.finance_cost.finance_cost_items', [
            'MainProperty' => $mainProperty,
            'ItemPurchaseCostData' => $financeCostData
        ]);

        if ($saved) {
            return response()->json([
                'success' => true,
                'view' => $view,
                'totalAmount' => $financeCostData['TotalAmount'],
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'errors' => 'Something went wrong',
            ], 400);
        }
    }

    public function deleteFinancingCostMainProperty(Request $request)
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
        $res=ItemfinanceCost::where('id',$id)->delete();

        $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();

        // get total loan amount
        $totalLoanAmount = $request->input('TotalLoanAmount');
        
        $financeCostData = financeCost($MainProperty, $totalLoanAmount);
        
        MainProperty::where('prop_id',$request->propertyID)->update(['prop_finance_cost' => $financeCostData['TotalAmount']]);
        $view = (string)view('dashboard.finace_cash_out.finance_cost.finance_cost_items',['MainProperty' => $MainProperty, 'ItemPurchaseCostData' => $financeCostData]);

        if($res){
            return response()->json([
                'success' => true,
                'view'        => $view,
                'totalAmount' => $financeCostData['TotalAmount']
            ], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }

}