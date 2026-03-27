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
use App\Models\itemSellingCost;
use App\Models\itemImprovementCost;
use App\Models\itemConvDeed;
use App\Models\itemHoldingCost;
use App\Models\PropertyGalleryModel;
use App\Models\ItemRefinanceCost;
use App\Models\PropertyDepreciation;
use App\Models\ItemServicesMisclaniousCost;

class PropertyController extends Controller
{

    public function property_list()
    {
        $property_list = Property::orderBy("id")->get();
        return view('front.property-list', compact('property_list'));
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
                                            <td style="border-right:none; border-top:none; border-left:none; border-right:1px solid #ddd; text-align:center; font-weight:600;">
                                                Property</td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: none; text-align:center; font-weight:600;">Purchase Criteria</td>
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
                                            <td width="29.2%" style="border-left:none; border-top:none; border-bottom:1px solid #ddd;">Basic Purchase Price - BPP</td>
                                            <td width="41.6%" class="p-0" colspan="2" style="border:none;">
                                                <table class="table mb-0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="border:none; border-bottom:1px solid #ddd;">' . $list['basic_purchase_price_requirement'] . '
                                                            </td>
                                                            <td style="border:none; border-left:#ddd solid 1px; border-bottom:1px solid #ddd;">'.$list['basic_purchase_price_actual'] . '</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="24.7%" style="border:none; border-left:1px solid #ddd;">
                                                <span id="iconns"><i class="fa fa-times rd_tik"></i></span> Meeting
                                            </td>
                                            <td style="border:none; border-left:1px solid #ddd;">
                                                <span class="sucal_qess" tooltip="No Action Needed DoingGreat ! keep it up ! Show this message in pop up. this message should be." flow="left"> !</span>
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
                                            <td width="29.2%" style="border-left:none; border-top:none; border-bottom:none;">Total cash Needed </td>
                                            <td width="41.6%" class="p-0" colspan="2" style="border:none;">
                                                <table class="table mb-0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="border:none; border-bottom:1px solid #ddd;"> ' . $list['total_cash_needed_requirement'] . '</td>
                                                            <td style="border:none; border-left:#ddd solid 1px; border-bottom:1px solid #ddd;">' . $list['total_cash_needed_actual'] . '</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="24.7%" style=" border-left:1px solid #ddd;">
                                                <span id="iconns"><i class="fa fa-check gr_tik"></i> </span> Not
                                                Meeting
                                            </td>
                                            <td style="border:none; border-left:1px solid #ddd; border-top:1px solid #ddd;">
                                                <span class="sucal_qess" tooltip="Watch This short Video for Help ! Show this message in pop up. this message should be dynamic. because i" flow="left"> !</span>
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
                                            <td width="29.2%" style="border-bottom:none; border-left:none;">Total Cash Invested</td>
                                            <td width="41.6%" class="p-0" colspan="2" style="border:none;">
                                                <table class="table mb-0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="border:none;">' . $list['total_cash_invested_requirement'] . '</td>
                                                            <td style="border:none; border-left:#ddd solid 1px;">' . $list['total_cash_invested_actual'] . '</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="24.7%" style="border-top: none; border-bottom: none;">
                                                <span id="iconns"><i class="fa fa-times rd_tik"></i></span> Meeting
                                            </td>
                                            <td style="border:none; border-left:1px solid #ddd; border-top:1px solid #ddd;">
                                                <span class="sucal_qess" tooltip="No Action Needed DoingGreat ! keep it up ! Show this message in pop up. this message should be."flow="left"> !</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>';
        }
        echo $html;
    }
    public function getPropertyList(Request $request)
    {
        $html = '';
        $title = $request->input('title');
        if (!empty($title)) {
            // Property::where('title', 'like', "%$title%");
            // Property::where('property_type', 'like', "%$title%");
            $property_list = Property::where('property_type', 'like', "%$title%")->orderBy("id")->get();
        } else {
            $property_list = Property::orderBy("id")->get();
        }

        foreach ($property_list as $list) {
            $html .= '  <div class="col-lg-4">
                        <div class="list_box_area">
                            <div class="img_area">
                                <div class="ovr_bstss">
                                    <div class="und_tkss">
                                        <a href="javascript:void(0);"><i class="fa fa-check-circle"></i></a>
                                    </div>
                                </div>
                                <img src="' . url('img') . '/' . $list['image'] . '" alt="" />
                            </div>
                            <div class="ic_area">
                                <div class="croosss" onclick="purchase_criteria(' . $list['id'] . ')"
                                    data-toggle="modal" data-target="#purchase_criteria">
                                    <i class="fa fa-times"></i>
                                </div>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-share"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-cloud-download"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-trash"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="cnt_boxxs">
                                <h4>'. $list['property_type']. '</h4>
                                <p>' . $list['title'] . ' ' . $list['owner'] . ', Atlate,
                                    ' . $list['location'] . '</p>
                                <span>$' . $list['rent_price'] . '/Mo Cash Flow ' . $list['cash_flow'] . '% Cap
                                    Rate ' . $list['cap_rate'] . '% COC</span>
                            </div>
                        </div>
                    </div>';
        }
        echo $html;
        // return view('front.property-list', compact('property_list'));
    }

    public function addPropertyType1($propertyID=null)
    {

        if($propertyID){
            $propertyID = base64_decode($propertyID);
            $userid = Auth::id();
            $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
            if(!$MainProperty){
                Session::flash('error','Invalid Request');
                return redirect()->route('home');
            }

            $PropertyAddress = PropertyAddress::where('prop_id', '=', $propertyID)->first();
            $PropertyDescription = PropertyDescription::where('prop_id', '=', $propertyID)->first();
        }

        $countryList = DB::table('rk_countries')->get();
        if($propertyID){
            return view('dashboard.addPropertyType1')
            ->with([
                'propertyID' => $propertyID,
                'countryList'=> $countryList,
                'MainProperty' => $MainProperty,
                'PropertyAddress' => $PropertyAddress,
                'PropertyDescription' => $PropertyDescription
            ]);
        }else{
            return view('dashboard.add-description',compact('countryList'));
        }
    }

    public function save_property_description(Request $request)
    {
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



        // save main property fields

        if($propertyID){
            $MainProperty = MainProperty::where('prop_id', $propertyID)->first();
        }else{
            $MainProperty = new MainProperty;
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
        // if(isset($propvideo)){
        //     $MainProperty->videos = $propvideo;
        // }
        if(isset($propresources)){
            $MainProperty->other_resources = $propresources;
        }
        $MainProperty->created_at = now();
        $MainProperty->updated_at = now();
        $MainProperty->save();
        $prop_id = $MainProperty->prop_id;
         // Get input arrays from the request
        $video_titles = $request->input('video_title'); // Array of video titles
        $video_links = $request->input('video_link'); // Array of video links
        if(is_array($video_titles)){
            PropertyGalleryModel::where(['category'=>2, 'prop_id'=> $prop_id])->delete();
        }

        // Check if video_titles is provided and is an array
        if ($video_titles && is_array($video_titles)) {
            foreach ($video_titles as $key => $title) {
                // Create a new VideoGallery model instance
                $VideoGallery = new PropertyGalleryModel;
                // Set properties for the video gallery
                $VideoGallery->prop_id = $prop_id;
                $VideoGallery->category = 2;
                $VideoGallery->title = $title; // Video title
                $VideoGallery->link = $video_links[$key] ?? null;
                $VideoGallery->status = 1; // Default status
                $VideoGallery->created_by = auth()->id() ?? 0;
                $VideoGallery->save();
            }
        }

        // save property gallery
        $resources_title = $request->input('resources_title'); // Array of titles
        $resources_type = $request->input('resources_type'); // Array of types
        $resources_file_type = $request->input('resources_file_type'); // Array of file types
        $resources_link = $request->input('resources_link'); // Array of links
        $resources_file = $request->input('resources_file'); // Array of file paths (if uploaded)
        if(is_array($resources_title)){
            PropertyGalleryModel::where(['category'=>3, 'prop_id'=> $prop_id])->delete();
        }
        if ($resources_title && is_array($resources_title)) {
            foreach ($resources_title as $key => $title) {
                $PropertyGallery = new PropertyGalleryModel;
                $PropertyGallery->prop_id = $prop_id;
                $PropertyGallery->category = 3; // Type
                $PropertyGallery->title = $title;
                $PropertyGallery->type = $resources_type[$key] ?? null; // Type
                $PropertyGallery->file_type = $resources_file_type[$key] ?? null; // File type
                $PropertyGallery->link = $resources_link[$key] ?? null; // Link
                $PropertyGallery->image = $resources_file[$key] ?? null; // File path (if any)
                $PropertyGallery->status = 1; // Default status
                $PropertyGallery->created_by = auth()->id() ?? 0;
                $PropertyGallery->save();
            }
        }



        // save property Address
        $PropertyAddress = PropertyAddress::where('prop_id', '=', $propertyID)->first();
        if(is_null($PropertyAddress)){
            $PropertyAddress = new PropertyAddress;
        }
        // dd($PropertyAddress);
        $PropertyAddress->prop_id = $MainProperty->prop_id;
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
        // dd($MainProperty->prop_id);

        // save property Description
        $PropertyDescription = PropertyDescription::where('prop_id', $propertyID)->first();
        if(is_null($PropertyDescription)){
            $PropertyDescription = new PropertyDescription;
        }
        $PropertyDescription->prop_id = $MainProperty->prop_id;
        $PropertyDescription->desc_type = $request->input('ptype');
        $PropertyDescription->bedrooms = $request->input('bedrooms');
        $PropertyDescription->bathrooms = $request->input('bathrooms');
        $PropertyDescription->desc_year = $request->input('year');
        $PropertyDescription->desc_parking = $request->input('parking');
        $PropertyDescription->no_of_parking = $request->input('no_of_parking');
        $PropertyDescription->desc_lot = $request->input('lot');
        $PropertyDescription->desc_zoning = $request->input('zoning');
        $PropertyDescription->desc_mlsn = $request->input('mlsn');
        $PropertyDescription->desc_transaction = $request->input('ptransactiontype');
        $PropertyDescription->desc_status = $request->input('pstatus');
        $PropertyDescription->desc_category_type = $request->input('pcategorytype');
        $PropertyDescription->desc_lot_type = $request->input('psizetype');
        $PropertyDescription->desc_category = $request->input('pcategory');
        $PropertyDescription->save();
        if($propertyID){
            Session::flash('success','Property '. $request->input('property_name') . ' Updated Successfully, Keep Going');
            return redirect()->route('properties.new-property.book-finance-payment', ['id' => base64_encode($MainProperty->prop_id)]);
        }
        else {
            Session::flash('success','Property '. $request->input('property_name') . ' Added Successfully, Keep Going');
            return redirect()->route('properties.new-property.book-finance-payment', ['id' => base64_encode($MainProperty->prop_id)]);
        }
    }
    // ===================================|        Store gallery file         |===================================


    public function store_property_gallery(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,svg,pdf,docx', // Add more file types as needed
        ]);

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . 'GLR_' . $file->getClientOriginalName();
            $file->move(public_path().'/uploads/property/', $fileName);
            $filePath = 'uploads/property/'.$fileName;
            return response()->json([
                'success' => true,
                'file_path' => $filePath
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded or the file is invalid.'
        ]);
    }
    public function delete_property_gallery_file(Request $request)
    {

        $request->validate([
            'file_path' => 'required|string',
        ]);
        $filePath = $request->input('file_path');
        if ($filePath) {
            $fileToDelete = public_path($filePath);
            if (file_exists($fileToDelete)) {
                unlink($fileToDelete);
            }
            return response()->json([
                'success' => true,
                'message' => 'File and associated record deleted successfully.'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'File not found in database.'
        ]);
    }


    // ===================================|        Store gallery file         |===================================

    public function getPropertyType1Count()
    {
        $MainProperty = MainProperty::where('user_id', Auth::id())->get();
        $MainPropertyCount = $MainProperty->count();

        return $MainPropertyCount;
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
    public function update_finance_price(Request $request){
        $prop_id = $request->prop_id;
        $MainProperty = MainProperty::where(['prop_id'=> $prop_id,'user_id'=>Auth::id()])->first();
        if(!$MainProperty){
            return false;
        }
        $MainProperty->prop_purchasePrice = $request->input('basicPurchasePrice');
        $MainProperty->prop_paidAmount = $request->input('actualPaidAmount');
        $MainProperty->prop_salePrice = $request->input('basicSalePrice');
        $MainProperty->prop_costPercent = $request->input('closingCostEstimatePercent');
        $MainProperty->prop_sale_discount = $request->input('prop_sale_discount');
        $MainProperty->updated_at = now();
        $res = $MainProperty->save();
        if($res){
            return $prop_id;
        }else{
            return false;
        }

    }
    public function save_book_finance_payment(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where(['prop_id'=> $propertyID,'user_id'=>$userid])->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->back();
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

            PropertyLoan::where('property_id', '=', $propertyID)->delete();

            $counts = count($request->input('loan_label'));
            for($i=0;$i<$counts;$i++){
                $ItemPaidAmount = new PropertyLoan;
                $ItemPaidAmount->property_id = $propertyID;
                $ItemPaidAmount->loan_label = $_POST['loan_label'][$i];
                // $ItemPaidAmount->financingof = $_POST['financingof'][$i];
                // $ItemPaidAmount->price_financing = $_POST['price_financing'][$i];
                
                $financing = $_POST['financingof'][$i];
                
                if ($financing === 'Custom Amount') {
                    $price_financing = $_POST['custom_amount'][$i];
                }
                else {
                    $price_financing = $_POST['price_financing'][$i];
                }
                
                $ItemPaidAmount->financingof = $financing;
                $ItemPaidAmount->price_financing = $price_financing;

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
            'prop_costPercent' => $request->input('prop_costPercent'),
            'prop_sale_discount' => $request->input('prop_sale_discount'),
            'purchaseCostPercent' => $request->input('closingCostEstimatePercent'),
            'updated_at' => now()
        ]);
        
        
        // check financial cost toggle
        if($request->input('financialCostitemizedToggle') != "on" && $request->input('prop_costPercent')){
            // delete properties paid amount items
            ItemfinanceCost::where('prop_id', $propertyID)->delete();
        }
        
        // check paid amount toggle
        if($request->input('paidAmountitemizedToggle') != "on" && $request->input('actualPaidAmount')){
            // delete properties paid amount items
            ItemPaidAmount::where('prop_id', $propertyID)->delete();
        }
        
        // check purchase cost toggle
        if($request->input('purchaseCostitemizedToggle') != "on" && $request->input('closingCostEstimatePercent')){
            // delete properties purchase cost items
            ItemPurchaseCost::where('prop_id', $propertyID)->delete();
        }

        if ($request->filled('redirect_back_edit_url')) {
            Session::flash('success','Book and Finance Information Updated Successfully!');
            return redirect()->route($request->input('redirect_back_edit_url'), ['id' => base64_encode($propertyID)]);
        } else {
            Session::flash('success','Financial and Payment Information Updated For Your Property, Only 2 More Steps Left');
            return redirect()->route('properties.new-property.possession-improvement', ['id' => base64_encode($propertyID)]);
        }

    }

    public function addItemizedPaidAmount(Request $request)
    {
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
        $deleteFun = "deleteIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.",$ItemPaidAmount->paid_inLoan);";

        $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();

        // get total loan amount
        $totalLoanAmount = $request->input('TotalLoanAmount');
        
        $paidItemData = PaidCostsHelper($MainProperty, $totalLoanAmount);
        
        $totalPaidAmount = $paidItemData['TotalAmount'];
        MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_paidAmount' => $totalPaidAmount]);
        $view = (string)view('dashboard.buysell_book_pre_hold.itemized_paid_amount.itemized_paid_amount',['ItemPaidAmount' => $paidItemData]);

        if($saved){
            return response()->json([
                'success' => true,
                'id' => $ItemPaidAmount->id,
                'editFun' => $editFun,
                'deleteFun' => $deleteFun,
                'view'      => $view,
                'totalAmount'     => $paidItemData['TotalAmount']
            ], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    public function get_country()
    {
        $countries = DB::table('rk_countries')->select('id', 'name')->get();
        $optionset = '<option value="">N/A</option>';
        foreach($countries as $list){
            $optionset .= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        return $optionset;
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
    // ===================================|        PAID AMOUNT          |===================================
        public function EditItemizedPaidAmount(Request $request)
        {
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
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

            // get total loan amount
            $totalLoanAmount = $request->input('TotalLoanAmount');
            
            $paidItemData = PaidCostsHelper($MainProperty, $totalLoanAmount);
            
            $totalPaidAmount = $paidItemData['TotalAmount'];
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_paidAmount' => $totalPaidAmount]);
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();

            $newAmt = $ItemPaidAmount->paid_amount;
            $editFun = "editIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->prop_id.",'".$ItemPaidAmount->paid_name."','".$ItemPaidAmount->paid_type."',".$ItemPaidAmount->paid_amount.",'".$ItemPaidAmount->paid_percentOf."','".$ItemPaidAmount->paid_date."','".$ItemPaidAmount->paid_remarks."',".$ItemPaidAmount->paid_inLoan.");";
            $deleteFun = "deleteIPA(".$ItemPaidAmount->id.",".$ItemPaidAmount->paid_amount.",".$ItemPaidAmount->paid_inLoan.");";

            $view = (string)view('dashboard.buysell_book_pre_hold.itemized_paid_amount.itemized_paid_amount',['ItemPaidAmount' => $paidItemData]);
            if($saved){
                return response()->json([
                    'success' => true,
                    'id' => $ItemPaidAmount->id,
                    'oldAmt' => $oldAmt,
                    'newAmt' => $newAmt,
                    'editFun' => $editFun,
                    'view'  => $view,
                    'totalAmount'     => $paidItemData['TotalAmount'],
                    'deleteFun' => $deleteFun
                ], 200);
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

            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();

            // get total loan amount
            $totalLoanAmount = $request->input('TotalLoanAmount');
            
            $paidItemData = PaidCostsHelper($MainProperty, $totalLoanAmount);
            
            $totalPaidAmount = $paidItemData['TotalAmount'];
            MainProperty::where('prop_id',$request->propertyID)->update(['prop_paidAmount' => $totalPaidAmount]);
            $view = (string)view('dashboard.buysell_book_pre_hold.itemized_paid_amount.itemized_paid_amount',['ItemPaidAmount' => $paidItemData]);

            if($res){
                return response()->json([
                    'success'   => true,
                    'view'      => $view,
                    'totalAmount'     => $paidItemData['TotalAmount']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
    // ===================================|        PAID AMOUNT          |===================================
    // ===================================|      PURCHASE AMOUNT        |===================================
        public function addItemizedPurchasedAmount(Request $request)
        {
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

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPurchasedAmtPropertyID)->where('user_id',Auth::id())->first();

            // get total loan amount
            $totalLoanAmount = $request->input('TotalLoanAmount');
            
            $purchaseItemData = PurchaseCostsHelper($MainProperty, $totalLoanAmount);
            $totalPurchaseAmount = $purchaseItemData['TotalAmount'];
            MainProperty::where('prop_id',$request->itemizedPurchasedAmtPropertyID)->update(['prop_costPurchasePrice' => $totalPurchaseAmount]);
            $view = (string)view('dashboard.buysell_book_pre_hold.itemized_purchase_costs.itemized_purchase_amount',['ItemPurchaseCost' => $purchaseItemData, 'MainProperty' => $MainProperty]);

            if($saved){
                return response()->json([
                    'success' => true,
                    'id' => $ItemPaidAmount->id,
                    'view'      => $view,
                    'totalAmount'=>$totalPurchaseAmount
                ], 200);
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
            $newAmt = $ItemPaidAmount->paid_amount;

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPurchasedAmtPropertyID)->where('user_id',Auth::id())->first();

            // get total loan amount
            $totalLoanAmount = $request->input('TotalLoanAmount');
            
            $purchaseItemData = PurchaseCostsHelper($MainProperty, $totalLoanAmount);
            $totalPurchaseAmount = $purchaseItemData['TotalAmount'];
            MainProperty::where('prop_id',$request->itemizedPurchasedAmtPropertyID)->update(['prop_costPurchasePrice' => $totalPurchaseAmount]);
            $view = (string)view('dashboard.buysell_book_pre_hold.itemized_purchase_costs.itemized_purchase_amount',['ItemPurchaseCost' => $purchaseItemData, 'MainProperty' => $MainProperty]);
            if($saved){
                return response()->json([
                    'success' => true,
                    'id' => $ItemPaidAmount->id,
                    'view'      => $view,
                    'totalAmount'=>$totalPurchaseAmount
                ], 200);
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
                return redirect()->back();
            }

            $id = $request->input('id');
            // echo $id; die;
            $res=ItemPurchaseCost::where('id',$id)->delete();
            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();

            // get total loan amount
            $totalLoanAmount = $request->input('TotalLoanAmount');
            
            $purchaseItemData = PurchaseCostsHelper($MainProperty, $totalLoanAmount);
            $totalPurchaseAmount = $purchaseItemData['TotalAmount'];
            MainProperty::where('prop_id',$request->propertyID)->update(['prop_costPurchasePrice' => $totalPurchaseAmount]);
            $view = (string)view('dashboard.buysell_book_pre_hold.itemized_purchase_costs.itemized_purchase_amount',['ItemPurchaseCost' => $purchaseItemData, 'MainProperty' => $MainProperty]);

            if($res){
                return response()->json([
                    'success' => true,
                    'view'      => $view,
                    'totalAmount'=>$purchaseItemData['TotalAmount']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
    // ===================================|      PURCHASE AMOUNT        |===================================
    // ===================================| BUY POSSESSION IMPROVEMENT  |===================================
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
    // ===================================| BUY POSSESSION IMPROVEMENT  |===================================
    // ===================================| EXTRA CHARGES ON POSSESSION |===================================
        public function addItemizedExtraCharge(Request $request)
        {
            $ItemExtraCharge = new ItemExtraCharge;
            $ItemExtraCharge->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemExtraCharge->paid_name = $request->input('itemizedPaidAmtName');
            $ItemExtraCharge->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemExtraCharge->paid_amount = $request->input('itemizedPaidAmtPercent');
            }
            else{
                $ItemExtraCharge->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemExtraCharge->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemExtraCharge->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemExtraCharge->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemExtraCharge->created_at = now();
            $ItemExtraCharge->updated_at = now();
            $saved = $ItemExtraCharge->save();

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $extraChargesPossessionData = ExtraChargesPossession($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_extraChargePercent' => $extraChargesPossessionData['percentOfPrice']]);
            $view = (string)view('dashboard.buy_possession_improvement.extra_charges_possession.extra_charges_possession_items',['ItemExtraCharge' => $extraChargesPossessionData]);

            if($saved){
                return response()->json([
                    'success'     => true,
                    'view'        => $view,
                    'percentOfPrice' => $extraChargesPossessionData['percentOfPrice'],
                    'TotalAmount' => $extraChargesPossessionData['TotalAmount']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function EditItemizedExtraCharge(Request $request)
        {
            $ItemExtraCharge = ItemExtraCharge::where('id', '=', $request->input('itemizedPaidAmtID'))->first();
            $oldAmt = $ItemExtraCharge->paid_amount;
            $oldType = $ItemExtraCharge->paid_type;
            $oldTotalPercent = $request->input('oldTotalPercent');
            $propertyPurchasePrice = $request->input('propertyPurchasePrice');
            $oldTotalItemAmt = $request->input('totalItemizedPaidAmt');

            $ItemExtraCharge->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemExtraCharge->paid_name = $request->input('itemizedPaidAmtName');
            $ItemExtraCharge->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemExtraCharge->paid_amount = $request->input('itemizedPaidAmtPercent');
            }
            else{
                $ItemExtraCharge->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemExtraCharge->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemExtraCharge->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemExtraCharge->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemExtraCharge->updated_at = now();
            $saved = $ItemExtraCharge->save();
            // echo "<pre>".print_r($ItemExtraCharge, true);die;
            $newAmt = $ItemExtraCharge->paid_amount;
            $newType = $ItemExtraCharge->paid_type;

            // new total percent calculation
            /*if($oldType == 'percent'){
                $newTotalPercent = $oldTotalPercent - $oldAmt;
                $newTotalItemAmt = $oldTotalItemAmt - ($oldAmt * $propertyPurchasePrice / 100);
                if($newType == 'percent'){
                    $newTotalPercent = $newTotalPercent + $newAmt;
                    $newTotalItemAmt = $newTotalItemAmt + ($newAmt * $propertyPurchasePrice / 100);
                }
                else{
                    // amount
                    $newTotalPercent = $newTotalPercent + ($newAmt / $propertyPurchasePrice * 100);
                    $newTotalItemAmt = $newTotalItemAmt + $newAmt;
                }
            }
            else{
                // old type is amount
                $newTotalPercent = $oldTotalPercent - ($oldAmt / $propertyPurchasePrice * 100);
                $newTotalItemAmt = $oldTotalItemAmt - $oldAmt;
                if($newType == 'percent'){
                    $newTotalPercent = $newTotalPercent + $newAmt;
                    $newTotalItemAmt = $newTotalItemAmt + ($newAmt * $propertyPurchasePrice / 100);
                }
                else{
                    // amount
                    $newTotalPercent = $newTotalPercent + ($newAmt / $propertyPurchasePrice * 100);
                    $newTotalItemAmt = $newTotalItemAmt + $newAmt;
                }

            }*/
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $extraChargesPossessionData = ExtraChargesPossession($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_extraChargePercent' => $extraChargesPossessionData['percentOfPrice']]);
            $view = (string)view('dashboard.buy_possession_improvement.extra_charges_possession.extra_charges_possession_items',['ItemExtraCharge' => $extraChargesPossessionData]);

            if($saved){
                return response()->json([
                    'success'       => true,
                    'view'          => $view,
                    'percentOfPrice'=> $extraChargesPossessionData['percentOfPrice']
                    // 'id' => $ItemExtraCharge->id,
                    // 'oldAmt' => $oldAmt,
                    // 'newAmt' => $newAmt,
                    // 'editFun' => $editFun,
                    // 'deleteFun' => $deleteFun,
                    // 'newTotalPercent' => $newTotalPercent,
                    // 'newTotalItemAmt' => $newTotalItemAmt
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function deleteExtraChargeMainProperty(Request $request)
        {
            $propertyID = $request->input('propertyID');
            // make sure the property belong to auth user, redundent check
            $userid = Auth::id();
            $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
            if(!$MainProperty){
                Session::flash('error','Invalid Request');
                return redirect()->route('home');
            }

            $ItemExtraCharge = ItemExtraCharge::where('id', '=', $request->input('id'))->first();
            $oldAmt = $ItemExtraCharge->paid_amount;
            $oldType = $ItemExtraCharge->paid_type;
            $oldTotalPercent = $request->input('oldTotalPercent');
            $propertyPurchasePrice = $request->input('propertyPurchasePrice');
            $oldTotalItemAmt = $request->input('totalItemizedPaidAmt');

            $id = $request->input('id');
            $res = ItemExtraCharge::where('id',$id)->delete();

            // new total percent calculation
            if($oldType == 'percent'){
                $newTotalPercent = $oldTotalPercent - $oldAmt;
                $newTotalItemAmt = $oldTotalItemAmt - ($oldAmt * $propertyPurchasePrice / 100);
            }
            else{
                // old type is amount
                $newTotalPercent = $oldTotalPercent - ($oldAmt / $propertyPurchasePrice * 100);
                $newTotalItemAmt = $oldTotalItemAmt - $oldAmt;

            }
            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();
            $extraChargesPossessionData = ExtraChargesPossession($MainProperty);
            MainProperty::where('prop_id',$request->propertyID)->update(['prop_extraChargePercent' => $extraChargesPossessionData['percentOfPrice']]);
            $view = (string)view('dashboard.buy_possession_improvement.extra_charges_possession.extra_charges_possession_items',['ItemExtraCharge' => $extraChargesPossessionData]);
            if($res){
                return response()->json([
                    'success' => true,
                    'view'            => $view,
                    'percentOfPrice'  => $extraChargesPossessionData['percentOfPrice']
                    /*'newTotalPercent' => $newTotalPercent,
                    'newTotalItemAmt' => $newTotalItemAmt,*/
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
    // ===================================| EXTRA CHARGES ON POSSESSION |===================================
    // ===================================|      IMPROVEMENT COST       |===================================
        public function addItemizedImprovementCost(Request $request)
        {
            $ItemImprovementCost = new ItemImprovementCost;
            $ItemImprovementCost->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemImprovementCost->paid_name = $request->input('itemizedPaidAmtName');
            $ItemImprovementCost->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemImprovementCost->paid_amount = $request->input('itemizedPaidAmtPercent');
            }
            else{
                $ItemImprovementCost->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemImprovementCost->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemImprovementCost->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemImprovementCost->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemImprovementCost->created_at = now();
            $ItemImprovementCost->updated_at = now();
            $saved = $ItemImprovementCost->save();

            $editFun = "editIC(".$ItemImprovementCost->id.",".$ItemImprovementCost->prop_id.",'".$ItemImprovementCost->paid_name."','".$ItemImprovementCost->paid_type."',".$ItemImprovementCost->paid_amount.",'".$ItemImprovementCost->paid_percentOf."','".$ItemImprovementCost->paid_date."',".$ItemImprovementCost->paid_inLoan.");";
            $deleteFun = "deleteIC(".$ItemImprovementCost->id.",".$ItemImprovementCost->paid_amount.");";

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $improvementCostData = ImprovementCosts($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_improvementCostPercent' => $improvementCostData['percentOfPrice']]);
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $view = (string)view('dashboard.buy_possession_improvement.improvement_cost.improvement_cost_items',['ItemImprovementCost' => $improvementCostData]);

            if($saved){
                return response()->json([
                    'success'    => true,
                    'id'         => $ItemImprovementCost->id,
                    'view'       => $view,
                    'totalAmount'=> $improvementCostData['TotalAmount'],
                    'percentOfPrice'=> $improvementCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function deleteImprovementCostMainProperty(Request $request)
        {
            $propertyID = $request->input('propertyID');
            // make sure the property belong to auth user, redundent check
            $userid = Auth::id();
            $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
            if(!$MainProperty){
                Session::flash('error','Invalid Request');
                return redirect()->route('home');
            }

            $ItemImprovementCost = ItemImprovementCost::where('id', '=', $request->input('id'))->first();
            $oldAmt = $ItemImprovementCost->paid_amount;
            $oldType = $ItemImprovementCost->paid_type;
            $oldTotalPercent = $request->input('oldTotalPercent');
            $propertyPurchasePrice = $request->input('propertyPurchasePrice');
            $oldTotalItemAmt = $request->input('totalItemizedPaidAmt');

            $id = $request->input('id');
            $res = ItemImprovementCost::where('id',$id)->delete();

            // new total percent calculation
            if($oldType == 'percent'){
                $newTotalPercent = $oldTotalPercent - $oldAmt;
                $newTotalItemAmt = $oldTotalItemAmt - ($oldAmt * $propertyPurchasePrice / 100);
            }
            else{
                // old type is amount
                $newTotalPercent = $oldTotalPercent - ($oldAmt / $propertyPurchasePrice * 100);
                $newTotalItemAmt = $oldTotalItemAmt - $oldAmt;
            }

            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();
            $improvementCostData = ImprovementCosts($MainProperty);
            MainProperty::where('prop_id',$request->propertyID)->update(['prop_improvementCostPercent' => $improvementCostData['percentOfPrice']]);
            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();
            $view = (string)view('dashboard.buy_possession_improvement.improvement_cost.improvement_cost_items',['ItemImprovementCost' => $improvementCostData ]);

            if($res){
                return response()->json([
                    'success'         => true,
                    'newTotalPercent' => $newTotalPercent,
                    'newTotalItemAmt' => $newTotalItemAmt,
                    'view'            => $view,
                    'totalAmount'     => $improvementCostData['TotalAmount'],
                    'percentOfPrice'  => $improvementCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function EditImprovementCostMainProperty(Request $request)
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
                                ->update(['prop_improvementCostPercent' => $request->input('paidAmt'),
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
        public function EditItemizedImprovementCost(Request $request)
        {
            $ItemImprovementCost = ItemImprovementCost::where('id', '=', $request->input('itemizedPaidAmtID'))->first();
            $oldAmt = $ItemImprovementCost->paid_amount;
            $oldType = $ItemImprovementCost->paid_type;
            $oldTotalPercent = $request->input('oldTotalPercent');
            $propertyPurchasePrice = $request->input('propertyPurchasePrice');
            $oldTotalItemAmt = $request->input('totalItemizedPaidAmt');

            $ItemImprovementCost->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemImprovementCost->paid_name = $request->input('itemizedPaidAmtName');
            $ItemImprovementCost->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemImprovementCost->paid_amount = $request->input('itemizedPaidAmtPercent');
            }
            else{
                $ItemImprovementCost->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemImprovementCost->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemImprovementCost->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemImprovementCost->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemImprovementCost->updated_at = now();
            $saved = $ItemImprovementCost->save();
            $newAmt = $ItemImprovementCost->paid_amount;
            $newType = $ItemImprovementCost->paid_type;
            $editFun = "editIC(".$ItemImprovementCost->id.",".$ItemImprovementCost->prop_id.",'".$ItemImprovementCost->paid_name."','".$ItemImprovementCost->paid_type."',".$ItemImprovementCost->paid_amount.",'".$ItemImprovementCost->paid_percentOf."','".$ItemImprovementCost->paid_date."',".$ItemImprovementCost->paid_inLoan.");";
            $deleteFun = "deleteIC(".$ItemImprovementCost->id.",".$ItemImprovementCost->paid_amount.");";

            // new total percent calculation
            /*if($oldType == 'percent'){
                $newTotalPercent = $oldTotalPercent - $oldAmt;
                $newTotalItemAmt = $oldTotalItemAmt - ($oldAmt * $propertyPurchasePrice / 100);
                if($newType == 'percent'){
                    $newTotalPercent = $newTotalPercent + $newAmt;
                    $newTotalItemAmt = $newTotalItemAmt + ($newAmt * $propertyPurchasePrice / 100);
                }
                else{
                    // amount
                    $newTotalPercent = $newTotalPercent + ($newAmt / $propertyPurchasePrice * 100);
                    $newTotalItemAmt = $newTotalItemAmt + $newAmt;
                }
            }
            else{
                // old type is amount
                $newTotalPercent = $oldTotalPercent - ($oldAmt / $propertyPurchasePrice * 100);
                $newTotalItemAmt = $oldTotalItemAmt - $oldAmt;
                if($newType == 'percent'){
                    $newTotalPercent = $newTotalPercent + $newAmt;
                    $newTotalItemAmt = $newTotalItemAmt + ($newAmt * $propertyPurchasePrice / 100);
                }
                else{
                    // amount
                    $newTotalPercent = $newTotalPercent + ($newAmt / $propertyPurchasePrice * 100);
                    $newTotalItemAmt = $newTotalItemAmt + $newAmt;
                }

            }*/
            // echo "oldT: $oldTotalItemAmt, oldamt: $oldAmt, NewAnt: $newTotalItemAmt";die;
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $improvementCostData = ImprovementCosts($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_improvementCostPercent' => $improvementCostData['percentOfPrice']]);
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $view = (string)view('dashboard.buy_possession_improvement.improvement_cost.improvement_cost_items',
            [
                'MainProperty'        => $MainProperty,
                'ItemImprovementCost' => $improvementCostData
            ]);
            if($saved){
                return response()->json([
                    'success'       => true,
                    'view'          => $view,
                    'totalAmount'   => $improvementCostData['TotalAmount'],
                    'percentOfPrice'=> $improvementCostData['percentOfPrice']
                    /*'id' => $ItemImprovementCost->id,
                    'oldAmt' => $oldAmt,
                    'newAmt' => $newAmt,
                    'editFun' => $editFun,
                    'deleteFun' => $deleteFun,
                    'newTotalPercent' => $newTotalPercent,
                    'newTotalItemAmt' => $newTotalItemAmt*/
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
    // ===================================|      IMPROVEMENT COST       |===================================
    // ===================================|    CONVEYANCE DEED COST     |===================================
        public function addItemizedConvDeed(Request $request)
        {
            $ItemConvDeed = new ItemConvDeed;
            $ItemConvDeed->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemConvDeed->paid_name = $request->input('itemizedPaidAmtName');
            $ItemConvDeed->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemConvDeed->paid_amount = $request->input('itemizedPaidAmtPercent');
            }else{
                $ItemConvDeed->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemConvDeed->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemConvDeed->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemConvDeed->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemConvDeed->created_at = now();
            $ItemConvDeed->updated_at = now();
            $saved = $ItemConvDeed->save();

            $editFun = "editCDC(".$ItemConvDeed->id.",".$ItemConvDeed->prop_id.",'".$ItemConvDeed->paid_name."','".$ItemConvDeed->paid_type."',".$ItemConvDeed->paid_amount.",'".$ItemConvDeed->paid_percentOf."','".$ItemConvDeed->paid_date."',".$ItemConvDeed->paid_inLoan.");";
            $deleteFun = "deleteCDC(".$ItemConvDeed->id.",".$ItemConvDeed->paid_amount.");";

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $conveyanceDeedCostData = ConveyanceDeedCost($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_ConvDeedPercent' => $conveyanceDeedCostData['percentOfPrice']]);
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $view = (string)view('dashboard.buy_possession_improvement.conveyance_deed_cost.conveyance_deed_cost_items',['ItemConvDeed' => $conveyanceDeedCostData]);

            if($saved){
                return response()->json([
                    'success'       => true,
                    'view'          => $view,
                    'percentOfPrice'=> $conveyanceDeedCostData['percentOfPrice']
                    /*'id' => $ItemConvDeed->id,
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
        public function EditItemizedConvDeed(Request $request)
        {
            $ItemConvDeed = ItemConvDeed::where('id', '=', $request->input('itemizedPaidAmtID'))->first();

            $ItemConvDeed->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemConvDeed->paid_name = $request->input('itemizedPaidAmtName');
            $ItemConvDeed->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemConvDeed->paid_amount = $request->input('itemizedPaidAmtPercent');
            }
            else{
                $ItemConvDeed->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemConvDeed->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemConvDeed->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemConvDeed->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemConvDeed->updated_at = now();
            $saved = $ItemConvDeed->save();

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $conveyanceDeedCostData = ConveyanceDeedCost($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_ConvDeedPercent' => $conveyanceDeedCostData['percentOfPrice']]);
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $view = (string)view('dashboard.buy_possession_improvement.conveyance_deed_cost.conveyance_deed_cost_items',['ItemConvDeed' => $conveyanceDeedCostData]);

            if($saved){
                return response()->json([
                    'success'       => true,
                    'view'          => $view,
                    'percentOfPrice'=> $conveyanceDeedCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function deleteConvDeedMainProperty(Request $request)
        {
            $propertyID = $request->input('propertyID');
            // make sure the property belong to auth user, redundent check
            $userid = Auth::id();
            $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
            if(!$MainProperty){
                Session::flash('error','Invalid Request');
                return redirect()->route('home');
            }

            $ItemConvDeed = ItemConvDeed::where('id', '=', $request->input('id'))->first();

            $id = $request->input('id');
            $res=ItemConvDeed::where('id',$id)->delete();

            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();
            $conveyanceDeedCostData = ConveyanceDeedCost($MainProperty);
            MainProperty::where('prop_id',$request->propertyID)->update(['prop_ConvDeedPercent' => $conveyanceDeedCostData['percentOfPrice']]);
            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();
            $view = (string)view('dashboard.buy_possession_improvement.conveyance_deed_cost.conveyance_deed_cost_items',['ItemConvDeed' => $conveyanceDeedCostData]);

            if($res){
                return response()->json([
                    'success'       => true,
                    'view'          => $view,
                    'percentOfPrice'=> $conveyanceDeedCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
    // ===================================|    CONVEYANCE DEED COST     |===================================
    // ===================================|         HOLDING COST        |===================================
        public function addItemizedHoldingCost(Request $request)
        {
            $ItemHoldingCost = new ItemHoldingCost;
            $ItemHoldingCost->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemHoldingCost->paid_name = $request->input('itemizedPaidAmtName');
            $ItemHoldingCost->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemHoldingCost->paid_amount = $request->input('itemizedPaidAmtPercent');
            }
            else{
                $ItemHoldingCost->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemHoldingCost->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemHoldingCost->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemHoldingCost->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemHoldingCost->created_at = now();
            $ItemHoldingCost->updated_at = now();
            $saved = $ItemHoldingCost->save();

            /*$editFun = "editHC(".$ItemHoldingCost->id.",".$ItemHoldingCost->prop_id.",'".$ItemHoldingCost->paid_name."','".$ItemHoldingCost->paid_type."',".$ItemHoldingCost->paid_amount.",'".$ItemHoldingCost->paid_percentOf."','".$ItemHoldingCost->paid_date."',".$ItemHoldingCost->paid_inLoan.");";
            $deleteFun = "deleteHC(".$ItemHoldingCost->id.",".$ItemHoldingCost->paid_amount.");";*/
            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $holdingCostData = HoldingCost($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_HoldingCostPercent' => $holdingCostData['percentOfPrice']]);
            $view = (string)view('dashboard.buy_possession_improvement.holding_cost.holding_cost_item',['holdingCostData' => $holdingCostData]);

            if($saved){
                return response()->json([
                    'success'       => true,
                    'view'          => $view,
                    'percentOfPrice'=> $holdingCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function EditItemizedHoldingCost(Request $request)
        {
            $ItemHoldingCost = ItemHoldingCost::where('id', '=', $request->input('itemizedPaidAmtID'))->first();

            $ItemHoldingCost->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemHoldingCost->paid_name = $request->input('itemizedPaidAmtName');
            $ItemHoldingCost->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemHoldingCost->paid_amount = $request->input('itemizedPaidAmtPercent');
            }
            else{
                $ItemHoldingCost->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemHoldingCost->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemHoldingCost->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemHoldingCost->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemHoldingCost->updated_at = now();
            $saved = $ItemHoldingCost->save();

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $holdingCostData = HoldingCost($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_HoldingCostPercent' => $holdingCostData['percentOfPrice']]);
            $view = (string)view('dashboard.buy_possession_improvement.holding_cost.holding_cost_item',['holdingCostData' => $holdingCostData]);

            if($saved){
                return response()->json([
                    'success'       => true,
                    'view'          => $view,
                    'percentOfPrice'=> $holdingCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function deleteHoldingCostMainProperty(Request $request)
        {
            $propertyID = $request->input('propertyID');
            // make sure the property belong to auth user, redundent check
            $userid = Auth::id();
            $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
            if(!$MainProperty){
                Session::flash('error','Invalid Request');
                return redirect()->route('home');
            }

            $ItemHoldingCost = ItemHoldingCost::where('id', '=', $request->input('id'))->first();
            $oldAmt = $ItemHoldingCost->paid_amount;
            $oldType = $ItemHoldingCost->paid_type;
            $oldTotalPercent = $request->input('oldTotalPercent');
            $propertyPurchasePrice = $request->input('propertyPurchasePrice');
            $oldTotalItemAmt = $request->input('totalItemizedPaidAmt');

            $id = $request->input('id');
            $res=ItemHoldingCost::where('id',$id)->delete();

            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();
            $holdingCostData = HoldingCost($MainProperty);
            MainProperty::where('prop_id',$request->propertyID)->update(['prop_HoldingCostPercent' => $holdingCostData['percentOfPrice']]);
            $view = (string)view('dashboard.buy_possession_improvement.holding_cost.holding_cost_item',['holdingCostData' => $holdingCostData]);

            if($res){
                return response()->json([
                    'success' => true,
                    'view'          => $view,
                    'percentOfPrice'=> $holdingCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
    // ===================================|         HOLDING COST        |===================================
    // ===================================|         SELLING COST        |===================================
        public function addItemizedSellingCost(Request $request){
            $ItemSellingCost = new ItemSellingCost;
            $ItemSellingCost->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemSellingCost->paid_name = $request->input('itemizedPaidAmtName');
            $ItemSellingCost->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemSellingCost->paid_amount = $request->input('itemizedPaidAmtPercent');
            }
            else{
                $ItemSellingCost->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemSellingCost->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemSellingCost->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemSellingCost->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemSellingCost->created_at = now();
            $ItemSellingCost->updated_at = now();
            $saved = $ItemSellingCost->save();

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $sellingCostData = SellingCosts($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_sellingCostPercent' => $sellingCostData['percentOfPrice']]);
            $view = (string)view('dashboard.sell.sell_cost_items',['MainProperty' => $MainProperty, 'sellingCostData' => $sellingCostData]);

            if($saved){
                return response()->json([
                    'success'        => true,
                    'view'           => $view,
                    'percentOfPrice' => $sellingCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function EditItemizedSellingCost(Request $request)
        {
            $ItemSellingCost = ItemSellingCost::where('id', '=', $request->input('itemizedPaidAmtID'))->first();
            $oldAmt = $ItemSellingCost->paid_amount;
            $oldType = $ItemSellingCost->paid_type;
            // $oldTotalPercent = $request->input('oldTotalPercent');
            // $propertySalePrice = $request->input('propertySalePrice');
            // $oldTotalItemAmt = $request->input('totalItemizedPaidAmt');

            $ItemSellingCost->prop_id = $request->input('itemizedPaidAmtPropertyID');
            $ItemSellingCost->paid_name = $request->input('itemizedPaidAmtName');
            $ItemSellingCost->paid_type = $request->input('itemizedPaidAmtType');
            if($request->input('itemizedPaidAmtType') == 'percent'){
                $ItemSellingCost->paid_amount = $request->input('itemizedPaidAmtPercent');
            }
            else{
                $ItemSellingCost->paid_amount = $request->input('itemizedPaidAmtAmount');
            }
            $ItemSellingCost->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
            $ItemSellingCost->paid_date = $request->input('itemizedPaidAmtDate');
            $ItemSellingCost->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
            $ItemSellingCost->updated_at = now();
            $saved = $ItemSellingCost->save();

            // $newAmt = $ItemSellingCost->paid_amount;
            // $newType = $ItemSellingCost->paid_type;
            // $editFun = "editIPA(".$ItemSellingCost->id.",".$ItemSellingCost->prop_id.",'".$ItemSellingCost->paid_name."','".$ItemSellingCost->paid_type."',".$ItemSellingCost->paid_amount.",'".$ItemSellingCost->paid_percentOf."','".$ItemSellingCost->paid_date."',".$ItemSellingCost->paid_inLoan.");";
            // $deleteFun = "deleteIPA(".$ItemSellingCost->id.",".$ItemSellingCost->paid_amount.");";

            $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
            $sellingCostData = SellingCosts($MainProperty);
            MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_sellingCostPercent' => $sellingCostData['percentOfPrice']]);
            $view = (string)view('dashboard.sell.sell_cost_items',['MainProperty' => $MainProperty, 'sellingCostData' => $sellingCostData]);

            if($saved){
                return response()->json([
                    'success' => true,
                    'view'          => $view,
                    'percentOfPrice' => $sellingCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
        public function deleteSellingCostMainProperty(Request $request)
        {
            $propertyID = $request->input('propertyID');
            $userid = Auth::id();
            $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
            if(!$MainProperty){
                Session::flash('error','Invalid Request');
                return redirect()->route('home');
            }

            $ItemSellingCost = ItemSellingCost::where('id', '=', $request->input('id'))->first();

            $id = $request->input('id');
            $res = ItemSellingCost::where('id',$id)->delete();

            $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();
            $sellingCostData = SellingCosts($MainProperty);
            MainProperty::where('prop_id',$request->propertyID)->update(['prop_sellingCostPercent' => $sellingCostData['percentOfPrice']]);
            $view = (string)view('dashboard.sell.sell_cost_items',['MainProperty' => $MainProperty, 'sellingCostData' => $sellingCostData]);

            if($res){
                return response()->json([
                    'success' => true,
                    'view'          => $view,
                    'percentOfPrice' => $sellingCostData['percentOfPrice']
                ], 200);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'Something Went Wrong',
                ], 400);
            }
        }
    // ===================================|         SELLING COST        |===================================

    public function EditExtraChargeMainProperty(Request $request)
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
                            ->update(['prop_extraChargePercent' => $request->input('paidAmt'),
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

    public function savePropertyType1possession(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }

        $MainPropertyUpdated = MainProperty::where('prop_id', '=', $propertyID)
        ->where('user_id', '=', $userid)
        ->update(['prop_extraChargePercent' => $request->input('totalextraChargePercentInput'),
        'prop_improvementCostPercent' => $request->input('totalImprovementCostPInput'),
        'prop_dateOfPossession' => $request->input('DateOfPossession'),
        'updated_at' => now()]);
        // dd($MainProperty->prop_type);
        
        // check extra charges toggle
        if($request->input('extraChargesitemizedToggle') != "on" && $request->input('totalextraChargePercentInput')){
            // delete properties extra charges items
            ItemExtraCharge::where('prop_id', $propertyID)->delete();
        }
        
        // check improvement cost toggle
        if($request->input('improvementCostitemizedToggle') != "on" && $request->input('totalImprovementCostPInput')){
            // delete properties improvement cost items
            ItemImprovementCost::where('prop_id', $propertyID)->delete();
        }
        
        // check cdr cost toggle
        if($request->input('cdrCostitemizedToggle') != "on" && $request->input('totalConvDeedPInput')){
            // delete properties cdr cost items
            ItemConvDeed::where('prop_id', $propertyID)->delete();
        }

        if ($request->filled('redirect_back_edit_url')) {
            Session::flash('success','Possession and Improvement Updated Successfully!');
            return redirect()->route($request->input('redirect_back_edit_url'), ['id' => base64_encode($propertyID)]);
        } else {
            if($MainProperty->prop_parent_type=='buy-sale'){
                 Session::flash('success','Possession Charges Information Updated For Your Property, 1 More Step To Go');
                return redirect()->route('addPropertyType1Book6', ['propertyID' => base64_encode($propertyID)]);
            }else if($MainProperty->prop_parent_type=='buy-refinance-sale'){
                Session::flash('success','Possession Charges Information Updated For Your Property, 2 More Step To Go');
                return redirect()->route('addPropertyType1Book5', ['propertyID' => base64_encode($propertyID)]);
            }else if($MainProperty->prop_parent_type=='buy-hold'){
                Session::flash('success','Possession Charges Information Updated For Your Property, 2 More Step To Go');
                return redirect()->route('properties.new-property.rentout-operate', ['id' => base64_encode($propertyID)]);
            }else {
                Session::flash('success','Possession Charges Information Updated For Your Property, 3 More Step To Go');
                return redirect()->route('properties.new-property.rentout-operate', ['id' => base64_encode($propertyID)]);
            }
        }
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





    public function EditSellingCostMainProperty(Request $request)
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
                            ->update(['prop_sellingCostPercent' => $request->input('paidAmt'),
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



    public function savePropertyType1longTermProjection(Request $request)
    {
        $propertyID = $request->input('propertyID');
        // make sure the property belong to auth user, redundent check
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            // Session::flash('error','Invalid Request');
            return redirect()->route('properties.list',['type'=>'buy-sale'])->with('error', 'Invalid Request');
        }

        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)
            ->update(['prop_dateOfSale' => $request->input('DateOfSale'),
        'prop_appreciationPercent' => $request->input('appreciationImput'),
        'prop_incomeIncreasePercent' => $request->input('incomeincreaseImput'),
        'prop_expenseIncreasePercent' => $request->input('expenseIncreaseImput'),
        'prop_sellingCostPercent' => $request->input('totalSellingCostPercentInput'),
        'prop_miscellaneousChargesPercent' => $request->input('prop_miscellaneousChargesPercent'),
        // 'prop_depreciationPeriod' => $request->input('depreciationPeriodImput'),
        // 'prop_landValue' => $request->input('depreciationLandValueImput'),
        'updated_at' => now()]);
        
        // save depreciation information
        if ($request->has('enable_depreciation')) {
            $landValueAmount = $request->input('land_value_amount');
            $landValuePercent = $request->input('land_value_percent');
    
            if ($landValueAmount !== null && $landValueAmount !== '') {
                $landValueType = 'amount';
            } elseif ($landValuePercent !== null && $landValuePercent !== '') {
                $landValueType = 'percent';
            } else {
                $landValueType = null;
            }
    
            $data = [
                'prop_id' => $propertyID,
                'depreciation_period' => $request->input('depreciation_period'),
                'land_value_type' => $landValueType,
                'land_value_amount' => $landValueType === 'amount' ? $landValueAmount : null,
                'land_value_percent' => $landValueType === 'percent' ? $landValuePercent : null,
                'land_value_percent_of' => $landValueType === 'percent' ? $request->input('land_value_percent_of') : null,
                'tax_rate' => $request->input('tax_rate'),
            ];
    
            PropertyDepreciation::updateOrCreate(['prop_id' => $propertyID], $data);
        } else {
            PropertyDepreciation::where('prop_id', $propertyID)->delete();
        }
        
        // check selling cost toggle
        if($request->input('sellingCostitemizedToggle') != "on" && $request->input('totalSellingCostPercentInput')){
            // delete properties selling cost items
            ItemSellingCost::where('prop_id', $propertyID)->delete();
        }
        
        // check miscellaneous charges toggle
        if($request->input('miscellaneousChargesitemizedToggle') != "on" && $request->input('prop_miscellaneousChargesPercent')){
            // delete properties miscellaneous charges items
            ItemServicesMisclaniousCost::where('prop_id', $propertyID)->delete();
        }


        if ($request->filled('redirect_back_edit_url')) {
            Session::flash('success','Projection and Sales Information Updated Successfully!');
            return redirect()->route($request->input('redirect_back_edit_url'), ['id' => base64_encode($propertyID)]);
        } else {
            return redirect()->route('properties.list',['type'=>'buy-sale'])->with('success', 'Your Property Has Been Successfully Saved');
        }
    }
    public function EditConvDeedMainProperty(Request $request)
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
                            ->update(['prop_ConvDeedPercent' => $request->input('paidAmt'),
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







    public function EditHoldingCostMainProperty(Request $request)
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
                            ->update(['prop_HoldingCostPercent' => $request->input('paidAmt'),
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
    public function landing_price(){
        return view('dashboard.landing-price');
    }

    
    public function addItemizedmiscellaneousCharges(Request $request){
        $ItemmiscellaneousCharges = new ItemServicesMisclaniousCost;
        $ItemmiscellaneousCharges->prop_id = $request->input('itemizedPaidAmtPropertyID');
        $ItemmiscellaneousCharges->paid_name = $request->input('itemizedPaidAmtName');
        $ItemmiscellaneousCharges->paid_type = $request->input('itemizedPaidAmtType');
        if($request->input('itemizedPaidAmtType') == 'percent'){
            $ItemmiscellaneousCharges->paid_amount = $request->input('itemizedPaidAmtPercent');
        }
        else{
            $ItemmiscellaneousCharges->paid_amount = $request->input('itemizedPaidAmtAmount');
        }
        $ItemmiscellaneousCharges->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
        $ItemmiscellaneousCharges->paid_date = $request->input('itemizedPaidAmtDate');
        $ItemmiscellaneousCharges->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
        $ItemmiscellaneousCharges->created_at = now();
        $ItemmiscellaneousCharges->updated_at = now();
        $saved = $ItemmiscellaneousCharges->save();

        $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
        $miscellaneousChargesData = miscellaneousCharges($MainProperty);
        MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_miscellaneousChargesPercent' => $miscellaneousChargesData['percentOfPrice']]);
        $view = (string)view('dashboard.miscellaneous_charges.miscellaneous_charges_items',['MainProperty' => $MainProperty, 'miscellaneousChargesData' => $miscellaneousChargesData]);

        if($saved){
            return response()->json([
                'success'        => true,
                'view'           => $view,
                'percentOfPrice' => $miscellaneousChargesData['percentOfPrice']
            ], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    public function EditItemizedmiscellaneousCharges(Request $request)
    {
        $ItemmiscellaneousCharges = ItemServicesMisclaniousCost::where('id', '=', $request->input('itemizedPaidAmtID'))->first();
        $oldAmt = $ItemmiscellaneousCharges->paid_amount;
        $oldType = $ItemmiscellaneousCharges->paid_type;

        $ItemmiscellaneousCharges->prop_id = $request->input('itemizedPaidAmtPropertyID');
        $ItemmiscellaneousCharges->paid_name = $request->input('itemizedPaidAmtName');
        $ItemmiscellaneousCharges->paid_type = $request->input('itemizedPaidAmtType');
        if($request->input('itemizedPaidAmtType') == 'percent'){
            $ItemmiscellaneousCharges->paid_amount = $request->input('itemizedPaidAmtPercent');
        }
        else{
            $ItemmiscellaneousCharges->paid_amount = $request->input('itemizedPaidAmtAmount');
        }
        $ItemmiscellaneousCharges->paid_percentOf = $request->input('itemizedPaidAmtPercentOf');
        $ItemmiscellaneousCharges->paid_date = $request->input('itemizedPaidAmtDate');
        $ItemmiscellaneousCharges->paid_inLoan = $request->input('itemizedPaidAmtInLoan');
        $ItemmiscellaneousCharges->updated_at = now();
        $saved = $ItemmiscellaneousCharges->save();

        $MainProperty = MainProperty::where('prop_id', $request->itemizedPaidAmtPropertyID)->where('user_id',Auth::id())->first();
        $miscellaneousChargesData = miscellaneousCharges($MainProperty);
        MainProperty::where('prop_id',$request->itemizedPaidAmtPropertyID)->update(['prop_miscellaneousChargesPercent' => $miscellaneousChargesData['percentOfPrice']]);
        $view = (string)view('dashboard.miscellaneous_charges.miscellaneous_charges_items',['MainProperty' => $MainProperty, 'miscellaneousChargesData' => $miscellaneousChargesData]);

        if($saved){
            return response()->json([
                'success' => true,
                'view'          => $view,
                'percentOfPrice' => $miscellaneousChargesData['percentOfPrice']
            ], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function deletemiscellaneousChargesMainProperty(Request $request)
    {
        $propertyID = $request->input('propertyID');
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }

        $id = $request->input('id');
        $res = ItemServicesMisclaniousCost::where('id',$id)->delete();

        $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();
        $miscellaneousChargesData = miscellaneousCharges($MainProperty);
        MainProperty::where('prop_id',$request->propertyID)->update(['prop_miscellaneousChargesPercent' => $miscellaneousChargesData['percentOfPrice']]);
        $view = (string)view('dashboard.miscellaneous_charges.miscellaneous_charges_items',['MainProperty' => $MainProperty, 'miscellaneousChargesData' => $miscellaneousChargesData]);

        if($res){
            return response()->json([
                'success' => true,
                'view'          => $view,
                'percentOfPrice' => $miscellaneousChargesData['percentOfPrice']
            ], 200);
        }
        else{
            return response()->json([
                'success' => 'false',
                'errors'  => 'Something Went Wrong',
            ], 400);
        }
    }
    
    public function loadmiscellaneousChargesItemized(Request $request)
    {
        $propertyID = $request->input('propertyID');
        $userid = Auth::id();
        $MainProperty = MainProperty::where('prop_id', '=', $propertyID)->where('user_id', '=', $userid)->first();
        if(!$MainProperty){
            Session::flash('error','Invalid Request');
            return redirect()->route('home');
        }

        $MainProperty = MainProperty::where('prop_id', $request->propertyID)->where('user_id',Auth::id())->first();
        $miscellaneousChargesData = miscellaneousCharges($MainProperty);
        MainProperty::where('prop_id',$request->propertyID)->update(['prop_miscellaneousChargesPercent' => $miscellaneousChargesData['percentOfPrice']]);
        $view = (string)view('dashboard.miscellaneous_charges.miscellaneous_charges_items',['MainProperty' => $MainProperty, 'miscellaneousChargesData' => $miscellaneousChargesData]);

        return response()->json([
            'success' => true,
            'view'          => $view,
            'percentOfPrice' => $miscellaneousChargesData['percentOfPrice']
        ], 200);
    }
}