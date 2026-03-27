<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\PropertyMarketModel;
use App\Models\PropertyCategoryModel;
use App\Models\PropertyCategoryTypeModel;
use App\Models\PropertyMarketDoc;
use App\Models\PropertyMarketDetailsModel;
use App\Models\PropertyMarketPriceModel;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class PropertyMarketController extends Controller
{
    public function index(){
        $properties = PropertyMarketModel::where('user_id',auth()->id())->with(['details', 'documents'])->withCount('payments')->orderBy('id','DESC')->get();
        $totalGrossPayment = $properties->sum(function ($property) {
            return optional($property->details)->gross_payment ?? 0;
        });
        $totalGrossCurrentMarketValue = $properties->sum(function ($property) {
            return optional($property->details)->current_market_value ?? 0;
        });
        $totalGrossCurrentDebtBalance = $properties->sum(function ($property) {
            return optional($property->details)->current_debt_balance ?? 0;
        });
        $totalGrossAccumulatedBalance = 0;
        if($totalGrossCurrentMarketValue>0 && $totalGrossCurrentDebtBalance>0){
            $totalGrossAccumulatedBalance = $totalGrossCurrentMarketValue-$totalGrossCurrentDebtBalance;
        }
        $totalGrossAnnualCashFlow = $properties->sum(function ($property) {
            return optional($property->details)->annual_cash_flow ?? 0;
        });
        // dd($properties);
        return view('front.my-properties',compact('properties','totalGrossPayment','totalGrossAnnualCashFlow', 'totalGrossAccumulatedBalance', 'totalGrossCurrentDebtBalance', 'totalGrossCurrentMarketValue'));
    }
    public function market_place_popup_data(Request $request)
    {
        $content = '';
    
        $popup_data = DB::table('tbl_property_marketplace_popup_details')
            ->where('id', $request->popup_id)
            ->first();
    
        if ($popup_data) {
    
            // Collect bullets dynamically
            $bullets = [
                $popup_data->bullet1,
                $popup_data->bullet2,
                $popup_data->bullet3,
                $popup_data->bullet4,
                $popup_data->bullet5,
                $popup_data->bullet6,
            ];
    
            $bulletHtml = '';
            foreach ($bullets as $bullet) {
                if (!empty($bullet)) {
                    $bulletHtml .= '<li><i class="fa fa-check-circle"></i> ' . e($bullet) . '</li>';
                }
            }
    
            // YouTube embed conversion (if normal link stored)
            $videoUrl = '';
            if (!empty($popup_data->vid_link)) {
                preg_match(
                    '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                    $popup_data->vid_link,
                    $matches
                );
                $videoId = $matches[1] ?? null;
                $videoUrl = $videoId ? 'https://www.youtube.com/embed/' . $videoId : '';
            }
    
            $content = '
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">' . e($popup_data->title ?? 'Your Property Inspection Now Made Easy!') . '</h4>
            </div>
    
            <div class="modal-body">
                <div class="vid_araeass">
                    <ul>' . $bulletHtml . '</ul>
                </div>';
    
            if ($videoUrl) {
                $content .= '
                <div class="veooo_araeaea">
                    <iframe
                        width="100%"
                        height="315"
                        src="' . $videoUrl . '"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>';
            }
    
            $content .= '
                <div class="payu_bntt">
                    <a href="javascript:void(0);"
                       data-toggle="modal"
                       onclick="openForm('.$request->prop_id .')"
                       >'
                       . e($popup_data->cta_title ?? 'Yes. Offer Me The Latest Update & Property Inspection Report From Your Expert Team!') .
                    '</a>
                </div>
            </div>';
        }
    
        return response()->json([
            'status' => true,
            'data'   => $content,
            'msg'    => 'Popup data found!'
        ]);
    }


    public function market_place_list(Request $request){
        // dd(app('currentAgent')->id);
        $cms_data = DB::table('tbl_property_marketplace_cms')->where('created_by', app('currentAgent')->id)->first();
        $popup_data = DB::table('tbl_property_marketplace_popup_details')->where('created_by', app('currentAgent')->id)->first();
        $cdo_data = DB::table('tbl_cdo')->select('id','name')->where('created_by', app('currentAgent')->id)->get();
        // dd($popup_data);
        $agent_id = app('currentAgent')->id;
        // $agent_id = 78;
        $perPage = $request->get('per_page', 6);
        $properties = PropertyMarketModel::select(
                'propertymarkets.id',
                'propertymarkets.property_id',
                'propertymarkets.current_status',
                'tbl_property_type.title as property_type_title',
                'tbl_property_category.title as property_category_title',
                'propertymarket_details.property_unit',
                'propertymarkets.property as property_name',
                'rk_countries.name as country_name',
                'rk_states.name as state_name',
                'rk_cities.name as city_name',
                'propertymarkets.location as location_area',
                'propertymarkets.project_name',
                'propertymarkets.price_from',
                'propertymarkets.price_to',
                'popdata.id as popdata_id',
                DB::raw('GROUP_CONCAT(DISTINCT propertymarket_docs_images.path ORDER BY propertymarket_docs_images.id ASC) AS images'),
                DB::raw('GROUP_CONCAT(DISTINCT propertymarket_docs_videos.path ORDER BY propertymarket_docs_videos.id ASC) AS video_links')
            )
            ->leftJoin('propertymarket_details', 'propertymarket_details.property_market_id', '=', 'propertymarkets.id')
            ->leftJoin('rk_countries', 'rk_countries.id', '=', 'propertymarket_details.prop_country')
            ->leftJoin('rk_states', 'rk_states.id', '=', 'propertymarket_details.prop_state')
            ->leftJoin('rk_cities', 'rk_cities.id', '=', 'propertymarket_details.prop_city')
            ->leftJoin('tbl_property_type', 'tbl_property_type.id', '=', 'propertymarkets.property_type')
            ->leftJoin('tbl_property_category', 'tbl_property_category.id', '=', 'propertymarkets.property_category')
            ->leftJoin('tbl_property_marketplace_popup_details as popdata', 'popdata.property_id', '=', 'propertymarkets.id')
        
            // images
            ->leftJoin('propertymarket_docs as propertymarket_docs_images', function($join){
                $join->on('propertymarket_docs_images.propertymarket_id', '=', 'propertymarkets.id')
                     ->where('propertymarket_docs_images.type', '=', 'images_image');
            })
        
            // videos
            ->leftJoin('propertymarket_docs as propertymarket_docs_videos', function($join){
                $join->on('propertymarket_docs_videos.propertymarket_id', '=', 'propertymarkets.id')
                     ->where('propertymarket_docs_videos.type', '=', 'video_link');
            })
        
            ->where('propertymarkets.market_status', 1)
            ->where('propertymarkets.agent_id', $agent_id)
            ->when($request->status, function ($query) use ($request) {
                $query->where('propertymarkets.status', $request->status);
            })
            ->groupBy(
                'propertymarkets.id',
                'propertymarkets.property_id',
                'propertymarkets.current_status',
                'tbl_property_type.title',
                'tbl_property_category.title',
                'propertymarket_details.property_unit',
                'propertymarkets.property',
                'rk_countries.name',
                'rk_states.name',
                'rk_cities.name',
                'propertymarkets.location',
                'propertymarkets.project_name',
                'popdata.id',
                'propertymarkets.price_from',
                'propertymarkets.price_to'
            );
            if($request->category){
                $properties = $properties->where('tbl_property_category.id', 'like', '%' . $request->category . '%');
            }
            if($request->search){
                $properties = $properties->where('propertymarkets.project_name', 'like', '%' . $request->search . '%')
                ->orWhere('propertymarkets.property', 'like', '%' . $request->search . '%');
            }
            if($request->unit){
                $properties = $properties->where('propertymarket_details.property_unit', 'like', '%' . $request->unit . '%');
            }
            if ($request->filled('budget')) {
                [$min, $max] = explode('-', $request->budget);

                $properties = $properties->where(function ($query) use ($min, $max) {
                    $query->whereBetween('propertymarkets.price_from', [(int)$min, (int)$max])
                        ->orWhereBetween('propertymarkets.price_to', [(int)$min, (int)$max]);
                });
            }

            $properties = $properties->orderBy('propertymarkets.id', 'DESC')
            
            ->paginate($perPage)
            ->appends(['per_page' => $perPage]);
            $category = PropertyCategoryModel::where('status', 1)->get();
        // dd($properties);
        return view('web.pages.market-place-list', compact('properties', 'category', 'cms_data', 'popup_data','cdo_data'));
    }
    public function save_property_enquiry(Request $request)
    {
        $request->validate([
            'prop_id'     => 'required|integer',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'mobile'      => 'required|string|max:20',
            'requirement' => 'nullable|string',
            'message'     => 'nullable|string',
        ]);
    
        DB::table('tbl_property_enquiry')->insert([
            'property_id' => $request->prop_id,
            'name'        => $request->name,
            'email'       => $request->email,
            'mobile'      => $request->mobile,
            'requirement' => $request->requirement,
            'message'     => $request->message,
            'agent_id'     => app('currentAgent')->id,
            'created_at'  => now(),
        ]);
    
        return redirect()->back()->with('success', 'Enquiry submitted successfully!');
    }

    public function market_place_data(Request $request){

        $properties = PropertyMarketModel::select(
                'propertymarkets.id',
                'propertymarkets.property_id',
                'propertymarkets.current_status',
                'tbl_property_type.title as property_type_title',
                'tbl_property_category.title as property_category_title',
                'propertymarket_details.property_unit',
                'propertymarkets.property as property_name',
                'rk_countries.name as country_name',
                'rk_states.name as state_name',
                'rk_cities.name as city_name',
                'propertymarkets.location as location_area',
                'propertymarkets.project_name',
                'propertymarkets.price_from',
                'propertymarkets.price_to',
                DB::raw('GROUP_CONCAT(DISTINCT propertymarket_docs_images.path ORDER BY propertymarket_docs_images.id ASC) AS images'),
                DB::raw('GROUP_CONCAT(DISTINCT propertymarket_docs_videos.path ORDER BY propertymarket_docs_videos.id ASC) AS video_links')
            )
            ->leftJoin('propertymarket_details', 'propertymarket_details.property_market_id', '=', 'propertymarkets.id')
            ->leftJoin('rk_countries', 'rk_countries.id', '=', 'propertymarket_details.prop_country')
            ->leftJoin('rk_states', 'rk_states.id', '=', 'propertymarket_details.prop_state')
            ->leftJoin('rk_cities', 'rk_cities.id', '=', 'propertymarket_details.prop_city')
            ->leftJoin('tbl_property_type', 'tbl_property_type.id', '=', 'propertymarkets.property_type')
            ->leftJoin('tbl_property_category', 'tbl_property_category.id', '=', 'propertymarkets.property_category')
        
            // images
            ->leftJoin('propertymarket_docs as propertymarket_docs_images', function($join){
                $join->on('propertymarket_docs_images.propertymarket_id', '=', 'propertymarkets.id')
                     ->where('propertymarket_docs_images.type', '=', 'images_image');
            })
        
            // videos
            ->leftJoin('propertymarket_docs as propertymarket_docs_videos', function($join){
                $join->on('propertymarket_docs_videos.propertymarket_id', '=', 'propertymarkets.id')
                     ->where('propertymarket_docs_videos.type', '=', 'video_link');
            })
        
            ->where('propertymarkets.market_status', 1)
            ->where('propertymarkets.agent_id', app('currentAgent')->id)
            ->when($request->status, function ($query) use ($request) {
                $query->where('propertymarkets.status', $request->status);
            })
            ->groupBy(
                'propertymarkets.id',
                'propertymarkets.property_id',
                'propertymarkets.current_status',
                'tbl_property_type.title',
                'tbl_property_category.title',
                'propertymarket_details.property_unit',
                'propertymarkets.property',
                'rk_countries.name',
                'rk_states.name',
                'rk_cities.name',
                'propertymarkets.location',
                'propertymarkets.project_name',
                'propertymarkets.price_from',
                'propertymarkets.price_to'
            )
            ->orderBy('propertymarkets.id', 'DESC')
            ->get();


        // dd($properties);
        // echo '<pre>';print_r($properties); die;
        $data = null;
        if ($properties->isNotEmpty()) {
            $data = view('web.pages.market-place-data', compact('properties'))->render();  
            return response()->json(['status'=>true, 'data' => $data, 'msg'=>'Data fetched successfully.']);
        }else{
            return response()->json(['status'=>false, 'data'=>null, 'msg'=>'No data found!']);
        }
    }
    
    public function create(){
        $countries = DB::table('rk_countries')->get();
        $category = PropertyCategoryModel::where('status', 1)->orderBy('id', 'asc')->get();
        $documents = collect(); 
        return view('front.add-portfolio-property',compact('countries','category', 'documents'));
    }
    public function generatePropertyID(){
        $prop_id = 'FY-'.rand(1000,9999).date('Ymd');
        $property = PropertyMarketModel::where('property_id',$prop_id)->exists();
        if($property){
            $this->generatePropertyID();
        }else{
            return $prop_id;
        }
    }
    public function getTypesByCategory(Request $request)
    {
        $id = $request->input('id');
    
        $category = PropertyCategoryModel::where('id', $id)->first(); 
        if (!$category) {
            return response()->json([], 404);
        }
    
        $types = PropertyCategoryTypeModel::where('status', 1)
                    ->where('category_id', $category->id)
                    ->orderBy('id', 'asc')
                    ->get();
    
        return response()->json($types);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'property_name' => 'required|string|max:100',
    //         // Add other required validations
    //     ]);
    
    //     // Step 1: Save Property Market Main Record
    //     $propertymarket = new PropertyMarketModel;
    //     $propertymarket->agent_id = app('currentAgent')->id;
    //     $propertymarket->user_id = auth()->id();
    //     $propertymarket->property_id = $this->generatePropertyID();
    //     $propertymarket->project_name = $request->property_name;
    //     $propertymarket->owner_name = $request->owner_name;
    //     $propertymarket->location = $request->location;
    //     $propertymarket->property_type = $request->property_type;
    //     $propertymarket->current_status = $request->current_status;
    //     $propertymarket->property = $request->project_name;
    //     $propertymarket->save();
    
    //     // Step 2: Save Property Details
    //     $details = new PropertyMarketDetailsModel;
    //     $details->property_market_id = $propertymarket->id;
    
    //     // Booking Details
    //     $details->date_of_booking = $request->date_of_booking;
    //     $details->date_of_registry = $request->date_of_registry;
    //     $details->date_of_possession = $request->date_of_possession;
    //     $details->gross_payment = $request->gross_payment;
    //     $details->parking = $request->parking;
    //     $details->no_of_parking = $request->no_of_parking;
    //     $details->category_type = $request->pcategorytype;
    //     $details->property_size = $request->property_size;
    //     $details->property_size_type = $request->property_size_type;
    //     $details->property_unit = $request->property_unit;
    //     $details->bedrooms = $request->bedrooms;
    //     $details->bathrooms = $request->bathrooms;
    //     $details->built_year = $request->built_year;
    //     $details->transaction_type = $request->transaction_type;
    
    //     // Address
    //     $details->prop_unit = $request->prop_unit;
    //     $details->tower_no = $request->tower_no;
    //     $details->building_name = $request->building_name;
    //     $details->street_no = $request->street_no;
    //     $details->prop_country = $request->prop_country;
    //     $details->prop_state = $request->prop_state;
    //     $details->prop_city = $request->prop_city;
    //     $details->prop_zip_code = $request->prop_zip_code;
    //     $details->prop_google_location = $request->prop_google_location;
    
    //     // Seller
    //     $details->seller_name = $request->seller_name;
    //     $details->seller_street_name = $request->seller_street_name;
    //     $details->seller_country_id = $request->seller_country_id;
    //     $details->seller_state_id = $request->seller_state_id;
    //     $details->seller_city_id = $request->seller_city_id;
    //     $details->seller_zip_code = $request->seller_zip_code;
    //     $details->seller_phone = $request->seller_phone;
    //     $details->seller_email = $request->seller_email;
    
    //     // Agent
    //     $details->agent_name = $request->agent_name;
    //     $details->agent_street_name = $request->agent_street_name;
    //     $details->agent_country_id = $request->agent_country_id;
    //     $details->agent_state_id = $request->agent_state_id;
    //     $details->agent_city_id = $request->agent_city_id;
    //     $details->agent_zip_code = $request->agent_zip_code;
    //     $details->agent_phone = $request->agent_phone;
    //     $details->agent_email = $request->agent_email;

    //     $details->current_market_value = $request->current_market_value;
    //     $details->current_debt_balance = $request->current_debt_balance;
    //     $details->annual_cash_flow = $request->annual_cash_flow;
    //     // dd($details);
    
    //     $details->save();
        
    //     // Step 3: Save Uploaded Documents Dynamically
    //     foreach ($request->files as $inputName => $file) {
    //         $path = $this->saveDocument($request, $inputName, 'uploads/property_docs');
    
    //         if ($path) {
    //             PropertyMarketDoc::create([
    //                 'propertymarket_id' => $propertymarket->id,
    //                 'type' => $inputName,
    //                 'path' => asset('').$path,
    //                 'uploaded_by' => auth()->id(),
    //             ]);
    //         }
    //     }
    //     // Step 3: Save video link
    //     if ($request->video_link) {
    //         PropertyMarketDoc::create([
    //             'propertymarket_id' => $propertymarket->id,
    //             'type' => 'video_link',
    //             'path' => $request->video_link,
    //             'uploaded_by' => auth()->id(),
    //         ]);
    //     }
    
    //     return redirect()->route('my-properties')->with('success', 'Property saved successfully!');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'property_name' => 'required|string|max:100',
            // Add other validations if needed
        ]);
        // dd($request->all());
     
        $isUpdate = $request->filled('id');
     
        // Step 1: Create or Update PropertyMarketModel
        $propertymarket = $isUpdate
            ? PropertyMarketModel::findOrFail($request->id)
            : new PropertyMarketModel;
     
        if (!$isUpdate) {
            $propertymarket->agent_id = app('currentAgent')->id;
            $propertymarket->user_id = auth()->id();
            $propertymarket->property_id = $this->generatePropertyID();
        }
     
        $propertymarket->project_name = $request->property_name;
        $propertymarket->owner_name = $request->owner_name;
        $propertymarket->location = $request->location;
        $propertymarket->property_type = $request->property_type;
        $propertymarket->current_status = $request->current_status;
        $propertymarket->property = $request->project_name;
        $propertymarket->save();
     
        // Step 2: Create or Update PropertyMarketDetailsModel
        $details = PropertyMarketDetailsModel::firstOrNew([
            'property_market_id' => $propertymarket->id,
        ]);
     
        // Assign all fields
        $details->date_of_booking = $request->date_of_booking;
        $details->date_of_registry = $request->date_of_registry;
        $details->date_of_possession = $request->date_of_possession;
        $details->gross_payment = $request->gross_payment;
        $details->parking = $request->parking;
        $details->no_of_parking = $request->no_of_parking;
        $details->category_type = $request->pcategorytype;
        $details->property_size = $request->property_size;
        $details->property_size_type = $request->property_size_type;
        $details->property_unit = $request->property_unit;
        $details->bedrooms = $request->bedrooms;
        $details->bathrooms = $request->bathrooms;
        $details->built_year = $request->built_year;
        $details->transaction_type = $request->transaction_type;
     
        // Address
        $details->prop_unit = $request->prop_unit;
        $details->tower_no = $request->tower_no;
        $details->building_name = $request->building_name;
        $details->street_no = $request->street_no;
        $details->prop_country = $request->prop_country;
        $details->prop_state = $request->prop_state;
        $details->prop_city = $request->prop_city;
        $details->prop_zip_code = $request->prop_zip_code;
        $details->prop_google_location = $request->prop_google_location;
     
        // Seller
        $details->seller_name = $request->seller_name;
        $details->seller_street_name = $request->seller_street_name;
        $details->seller_country_id = $request->seller_country_id;
        $details->seller_state_id = $request->seller_state_id;
        $details->seller_city_id = $request->seller_city_id;
        $details->seller_zip_code = $request->seller_zip_code;
        $details->seller_phone = $request->seller_phone;
        $details->seller_email = $request->seller_email;
     
        // Agent
        $details->agent_name = $request->agent_name;
        $details->agent_street_name = $request->agent_street_name;
        $details->agent_country_id = $request->agent_country_id;
        $details->agent_state_id = $request->agent_state_id;
        $details->agent_city_id = $request->agent_city_id;
        $details->agent_zip_code = $request->agent_zip_code;
        $details->agent_phone = $request->agent_phone;
        $details->agent_email = $request->agent_email;
     
        // Financial
        $details->current_market_value = $request->current_market_value;
        $details->current_debt_balance = $request->current_debt_balance;
        $details->annual_cash_flow = $request->annual_cash_flow;
     
        $details->save();
        // dd($request->files);
        // Remove old documents if user removed them
    if ($request->filled('removed_docs')) {
        $removed = explode(',', $request->input('removed_docs'));
     
        foreach ($removed as $type) {
            PropertyMarketDoc::where('propertymarket_id', $propertymarket->id)
                ->where('type', $type)
                ->delete();
        }
    }
        /// Step 3: Handle file uploads (images/documents)
        foreach ($request->files as $inputName => $file) {
            $path = $this->saveDocument($request, $inputName, 'uploads/property_docs');
     
            if ($path) {
                // Delete old document with the same type (like images_front)
                PropertyMarketDoc::where('propertymarket_id', $propertymarket->id)
                    ->where('type', $inputName)
                    ->delete();
     
                // Save new document
                PropertyMarketDoc::create([
                    'propertymarket_id' => $propertymarket->id,
                    'type'              => $inputName,
                    'path'              => asset('') . $path,
                    'uploaded_by'       => auth()->id(),
                ]);
            }
        }
     
        // Step 4: Handle video link (create or update)
        if ($request->video_link) {
            PropertyMarketDoc::updateOrCreate(
                [
                    'propertymarket_id' => $propertymarket->id,
                    'type'              => 'video_link',
                ],
                [
                    'path'        => $request->video_link,
                    'uploaded_by' => auth()->id(),
                ]
            );
        }
     
        $msg = $isUpdate ? 'Property updated successfully!' : 'Property created successfully!';
        return redirect()->route('my-properties')->with('success', $msg);
    }



    private function saveDocument(Request $request, string $inputName, string $folder = 'uploads/property_docs', ?string $oldPath = null): ?string
    {
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);
            $filename = time() . '_' . $inputName . '.' . $file->getClientOriginalExtension();
            $destination = public_path($folder);
    
            // Create folder if not exists
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            // Move file
            $file->move($destination, $filename);
            $path = "$folder/$filename";
    
            // Delete old file if exists
            if (!empty($oldPath) && file_exists(public_path($oldPath))) {
                unlink(public_path($oldPath));
            }
    
            return $path; // relative path to public
        }
    
        return null;
    }
    
    public function payment_details($prop_id){
        $property = PropertyMarketModel::where('property_id',$prop_id)->first();
        if(is_null($property)){
            return redirect()->back()->with('error', 'No Property Found!');
        }
        $payments = PropertyMarketPriceModel::where('property_market_id', $property->id)->get();
        // dd($payments);
        $totalAmount = $payments->sum('amount');
        
       return view('front.payment-details',compact('property', 'payments', 'totalAmount'));
    }

    

public function paymentstore(Request $request)
{
    // Validate input
    $request->validate([
        'amount' => 'required|numeric',
        'date' => 'required|date',
        'payment_mode' => 'required|in:Cash,By Netbanking,By Check',
        'funding_source' => 'required|string|max:255',
        'transaction' => $request->id
            ? 'nullable|file|mimes:jpeg,png,jpg,pdf|max:5120'
            : 'required|file|mimes:jpeg,png,jpg,pdf|max:5120',
        'receipt' => $request->id
            ? 'nullable|file|mimes:jpeg,png,jpg,pdf|max:5120'
            : 'required|file|mimes:jpeg,png,jpg,pdf|max:5120',
        'remark' => 'nullable|string|max:1000',
        // 'property_market_id' => 'required|exists:property_market_models,id',
    ]);
    // dd(request()->all());

    // Handle transaction proof
    if ($request->hasFile('transaction')) {
        $fileName1 = time() . '_transaction_' . $request->file('transaction')->getClientOriginalName();
        $request->file('transaction')->move(public_path('uploads/property_payments'), $fileName1);
        $transitionProofPath = 'uploads/property_payments/' . $fileName1;
    } else {
        $transitionProofPath = $request->old_transaction_proof ?? null;
    }

    // Handle receipt
    if ($request->hasFile('receipt')) {
        $fileName2 = time() . '_receipt_' . $request->file('receipt')->getClientOriginalName();
        $request->file('receipt')->move(public_path('uploads/property_payments'), $fileName2);
        $receiptPath = 'uploads/property_payments/' . $fileName2;
    } else {
        $receiptPath = $request->old_receipt_from_seller ?? null;
    }

    // Create or update record
    if ($request->id) {
        $record = PropertyMarketPriceModel::find($request->id);
        $message = 'Record updated successfully';
    } else {
        $record = new PropertyMarketPriceModel();
        $message = 'Record created successfully';
    }

    $record->property_market_id = $request->property_market_id;
    $record->amount = $request->amount;
    $record->paid_date = $request->date;
    $record->payment_mode = $request->payment_mode;
    $record->funding_source = $request->funding_source;
    $record->transition_proof = $transitionProofPath;
    $record->seller_receipt = $receiptPath;
    $record->remarks = $request->remark;
    $record->created_by = auth()->id();
    $record->save();
    // dd($record);

    return redirect()->back()->with('success', $message);
}

public function edit($id)
{
    $payment = PropertyMarketPriceModel::findOrFail($id);
    return response()->json($payment);
}
public function destroy($id)
{
    $payment = PropertyMarketPriceModel::findOrFail($id);

    // Delete associated files
    if ($payment->transition_proof && file_exists(public_path($payment->transition_proof))) {
        unlink(public_path($payment->transition_proof));
    }
    if ($payment->seller_receipt && file_exists(public_path($payment->seller_receipt))) {
        unlink(public_path($payment->seller_receipt));
    }

    $payment->delete();

    return response()->json(['success' => true, 'message' => 'Payment record deleted successfully.']);
}
public function updateStatus(Request $request)
{
    $request->validate([
        // 'prop_id' => 'required|exists:propertymarkets,id',
        'price_from' => 'required|numeric',
        'price_to' => 'required|numeric',
        'remarks' => 'nullable|string|max:1000',
        'status' => 'nullable|integer',
    ]);
    // dd($request->all());

    $property = PropertyMarketModel::where('property_id', $request->prop_id)->first(); // This throws 404 if not found

    $property->price_from = $request->price_from;
    $property->price_to = $request->price_to;
    $property->remarks = $request->remarks;
    $property->status = (int) $request->status ?? 1;
    $property->save();
    // dd($property);

    return redirect()->back()->with('success', 'Property status updated successfully.');
}
// download Property Pdf
public function downloadSinglePropertyPdf($id)
{
   $property = PropertyMarketModel::findOrFail($id);

    // Assuming PropertyDetailsModel has property_market_id as foreign key
    $details = PropertyMarketDetailsModel::where('property_market_id', $id)->first();

    $pdf = Pdf::loadView('front.property-pdf', compact('property', 'details'));

    return $pdf->download('property-' . $property->property_id . '.pdf');
}

// download Payment Pdf
public function generatePDF($propertyId)
{
    // Look up by primary key (numeric ID)
    $property = PropertyMarketModel::find($propertyId);

    if (!$property) {
        return response("Property with ID $propertyId not found", 404);
    }

    $payments = PropertyMarketPriceModel::where('property_market_id', $property->id)->get();
    $propertyName = $property->property ?? 'N/A';
    $fy = date('Y');

    $pdf = PDF::loadView('front.payment-pdf', compact('payments', 'propertyName', 'fy'));
    return $pdf->download('payment-details-' . $property->property_id . '.pdf');
}
public function editmarketplace($id)
{
    $property = PropertyMarketModel::findOrFail($id);
    $details = PropertyMarketDetailsModel::where('property_market_id', $property->id)->first();
    
    $countries = DB::table('rk_countries')->get();
    $category = PropertyCategoryModel::where('status', 1)->orderBy('id', 'asc')->get();
    $documents = PropertyMarketDoc::where('propertymarket_id', $property->id)->get();
    $grossPayment_paid = PropertyMarketPriceModel::where('property_market_id', $property->id)->sum('amount');
    // dd($grossPayment_paid);
    return view('front.add-portfolio-property', compact('property', 'details', 'countries', 'category', 'documents','grossPayment_paid'));
}
public function deleteMarketplace($id)
{
    // Step 1: Find the main property
    $property = PropertyMarketModel::findOrFail($id);

    // Step 2: Delete related details
    PropertyMarketDetailsModel::where('property_market_id', $property->id)->delete();
    PropertyMarketDoc::where('propertymarket_id', $property->id)->delete();
    PropertyMarketPriceModel::where('property_market_id', $property->id)->delete(); // Optional

    // Step 3: Delete the main property
    $property->delete();

    // Step 4: Redirect with message
    return redirect()->back()->with('success', 'Marketplace property deleted successfully.');
}




}