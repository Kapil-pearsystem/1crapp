<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GiftCategoryModel;
use App\Models\GiftModel;
use App\Models\GiftMailModel;
use App\Models\GiftCollectionModel;
use App\Models\ThankYouCardModel;
use App\Models\AgentDetail;
use App\Models\SubscriptionPlan;
use App\Models\GiftConfigModel;
use App\Models\MailCategoryModel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use App\Helper\Helper as Helper;

class GiftController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:gift-list|create|delete-gift|update-gift', ['only' => ['index']]);
        // $this->middleware('permission:create-gift', ['only' => ['create','store', 'updateStatus']]);
        // $this->middleware('permission:update-gift', ['only' => ['edit','update']]);
        // $this->middleware('permission:delete-gift', ['only' => ['delete']]);
    }
    public function index(){
        $gifts = GiftModel::select('tbl_gift.*','gift_category.name as category')->leftjoin('gift_category','gift_category.id','=','tbl_gift.category')->orderBy('tbl_gift.id','DESC')->get();
        return view('gift.gift-list',compact('gifts'));
    }
    public function create_gift_category(){
        return view('gift.add-gift-category');
    }
    public function store_gift_category(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if($request->id){
            $gift_category = GiftCategoryModel::find($request->id);
            $msg = 'Gift Category Updated Successfully';
        }else{
            $gift_category = new GiftCategoryModel();
            $msg = 'Gift Category Created Successfully';
        }
        $gift_category->name = $request->name;
        $gift_category->status = $request->status;
        $gift_category->created_by = auth()->user()->id;
        if($gift_category->save()){
            return redirect()->route('gift.category-list')->with('success', $msg);
        }else{
            return redirect()->back()->withInput()->with('error', 'Gift Category Creating Error!');
        }
    }
    
    public function gift_category_list(){
        $gift_category = GiftCategoryModel::all();
        return view('gift.gift-category-list',compact('gift_category'));
    }
    public function edit_gift_category($id){
        $gift_category = GiftCategoryModel::find($id);
        return view('gift.add-gift-category',compact('gift_category'));
    }
    public function delete_gift_category($id){
        if(GiftModel::where('category',$id)->exists()){
            return redirect()->back()->withInput()->with('error', 'This Category Already in use.');
        }
        $category = GiftCategoryModel::find($id);
        if($category){
            $category->delete();
            return redirect()->back()->withInput()->with('success', 'Category Deleted Successfully.');
        }
        return view('gift.add-gift',compact('gift_category'));
    }
    public function create(){
        $gift_category = GiftCategoryModel::where('status',1)->get();
        return view('gift.add-gift',compact('gift_category'));
    }
    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'category'=>'required',
            'title'=>'required',
            'description'=>'required',
            'mrp'=>'required',
            'discount'=>'required',
            'coupon_expire_date'=>'required',
            'coupon_status'=>'required',
            'ribbon'=>'required',
            'status'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error','Validation False!');
        }
        $image_name = array();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/gift'), $imageName);
                $image_name[] = 'uploads/gift/'.$imageName;

            }
            $images = implode(',',$image_name);
        }else{
            $images = base64_decode($request->old_images);
        }
        if($request->hasFile('thumbnail')) {
                $thumbnailName = time() . '_' . $request->thumbnail->getClientOriginalName();
                $request->thumbnail->move(public_path('uploads/gift'), $thumbnailName);
                $thumbnail_name = 'uploads/gift/'.$thumbnailName;
        }else{
            $thumbnail_name = base64_decode($request->old_thumbnail);
        }
        // dd($images);
        if($request->id){
            $gift = GiftModel::find($request->id);
            $msg = 'Gift Updated Successfully!';
        }else{
            $gift = new GiftModel();
            $msg = 'Gift Created Successfully!';
        }
        $gift->category = $request->category;
        $gift->title = $request->title;
        $gift->image = $images;
        $gift->description = $request->description;
        $gift->mrp = $request->mrp;
        $gift->discount = $request->discount;
        $gift->coupon_code = '1CRAPP-'.rand(111111,999999);
        $gift->coupon_discount = $request->coupon_discount;
        $gift->coupon_expire_date = $request->coupon_expire_date;
        $gift->coupon_status = $request->coupon_status;
        $gift->thumbnail = $thumbnail_name;
        $gift->ribbon = $request->ribbon;
        $gift->status = $request->status;
        $gift->created_by = auth()->user()->id;
        if($gift->save()){
            return redirect()->route('gift.index')->with('success',$msg);
        }else{
            return redirect()->back()->withInput()->with('success','Gift creating error!');
        }
    }
    public function edit($id){
        $gift = GiftModel::find($id);
        $gift_category = GiftCategoryModel::where('status',1)->get();
        return view('gift.add-gift',compact('gift_category','gift'));
    }
    public function delete($id){
        $gift = GiftModel::find($id);
        $gift->delete();
        return redirect()->back()->with('success','Gift Deleted Successfully!');
    }
    public function update_coupon_status(Request $request)
    {
        $tags = GiftModel::where(['id'=>$request->id,'created_by'=>auth()->user()->id])->first();
        if ($tags) {
            $tags->coupon_status = $request->status;
            $tags->save();
            return response()->json(['message' => 'Coupon status updated successfully!']);
        }
        return response()->json(['message' => 'Tags not found!'], 404);
    }
    public function update_gift_status(Request $request)
    {
        $tags = GiftModel::where(['id'=>$request->id,'created_by'=>auth()->user()->id])->first();
        if ($tags) {
            $tags->status = $request->status;
            $tags->save();
            return response()->json(['message' => 'Gift status updated successfully!']);
        }
        return response()->json(['message' => 'Tags not found!'], 404);
    }
    public function gallery(){
        $mails = GiftMailModel::where(['category'=>1, 'created_by'=>auth()->user()->id,'status'=>1])->get();
        $thankyou_card = ThankYouCardModel::where('status',1)->get();
        $gift_discount = GiftModel::select('discount')->distinct()->pluck('discount');
        $gift_category = GiftCategoryModel::where('status',1)->get();
        return view('gift.gallery',compact('gift_category','gift_discount','thankyou_card','mails'));
    }
    public function edit_gallery($id){
        // dd($id);
        $collection = GiftCollectionModel::find($id);
        if(is_null($collection)){
            return redirect()->back();
        }
        $mails = GiftMailModel::where(['created_by'=>auth()->user()->id,'status'=>1])->get();
        $thankyou_card = ThankYouCardModel::where('status',1)->get();
        $gift_discount = GiftModel::select('discount')->distinct()->pluck('discount');
        $gift_category = GiftCategoryModel::where('status',1)->get();
        return view('gift.gallery',compact('gift_category','gift_discount','thankyou_card','mails','collection'));
    }
    public function thank_you(){
        return view('gift.thank-you');
    }
    public function gallery_items(Request $request)
    {
        // $collection_id = $request->collection_id;
        // return $collection_id;
        $collection = GiftCollectionModel::find($request->collection_id);

        $category_id = $request->category_id;
        $availability_id = $request->availability_id;
        $discount_id = $request->discount_id;
        $search = $request->search;
        $total_gift = $request->total_gift ?: 0; // Number of items already loaded
        $page = $request->page ?: 1; // Current page

        $limit = 6; // Items per page
        $offset = ($page - 1) * $limit; // Calculate offset based on page number

        $gifts = GiftModel::select('tbl_gift.*', 'gift_category.name as category')
            ->leftjoin('gift_category', 'gift_category.id', '=', 'tbl_gift.category');

        if ($category_id) {
            $gifts = $gifts->where('tbl_gift.category', $category_id);
        }
        if ($availability_id) {
            $gifts = $gifts->where('tbl_gift.ribbon', $availability_id);
        }
        if ($discount_id) {
            $gifts = $gifts->where('tbl_gift.discount', $discount_id);
        }
        if ($search) {
            // dd($search);
            $gifts = $gifts->where(function ($query) use ($search) {
                $query->where('tbl_gift.title', 'like', "%$search%")
                    ->orWhere('tbl_gift.description', 'like', "%$search%");
            });
        }

        // Apply pagination
        if (!is_null($collection)) {
            $gifts = $gifts->orderByRaw("FIELD(tbl_gift.id, " . $collection->gift_ids . ") DESC")
            ->orderBy('tbl_gift.id')->limit($limit)->offset($offset);
        } else {
            $gifts = $gifts->limit($limit)->offset($offset);
        }
        $gifts = $gifts->get();

        if ($gifts->count() > 0) {
            $gift_items = view('gift.gallery-items', compact('gifts','collection'))->render();
            return response()->json([
                'status' => true,
                'data' => $gift_items,
                'limit' => ($page * $limit),
                'offset' => $offset,
                'message' => 'Success!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No More Gift Items Found!'
            ]);
        }
    }
    public function show_gift_images(Request $request)
    {
        $id = $request->id;
        $images = GiftModel::select('image')->where('id',$id)->first();
        // Convert the string to an array
        $imageArray = explode(',', $images);

        // Start generating the HTML string
        $html = '
                    <div class="nav-arrow left"></div>
                    <div class="nav-arrow right"></div>';

        // Loop through images to generate slide divs
        foreach ($imageArray as $index => $image) {
            $activeClass = ($index === 0) ? 'active' : ''; // Add 'active' class for the first slide
            $html .= '<div class="slide ' . $activeClass . '" title="Image ' . ($index + 1) . '" style="background-image: url(\'' . asset($image) . '\')"></div>';
        }

        // End the HTML string


        // Return the generated HTML
        return response()->json([
            'status' => true,
            'data' => $html
        ]);
    }
    public function get_selected_gifts(Request $request)
    {
        $request->validate([
            'gift_ids' => 'required|string',
            'mail_ids' => 'nullable|string',
            'tyc_id' => 'required'
        ]);

        $collection = GiftCollectionModel::find($request->collection_id);
        $thankyou_card = ThankYouCardModel::where(['id'=>$request->tyc_id,'status'=>1])->first();
        $gift_ids = explode(',', $request->input('gift_ids'));
        $mail_ids = $request->filled('mail_ids') ? explode(',', $request->input('mail_ids')) : [];
        $gifts = GiftModel::select('id', 'title', 'mrp', 'discount')->whereIn('id', $gift_ids)->get();
        $mails = GiftMailModel::select('id', 'subject')->whereIn('id', $mail_ids)->get();
        $gift_items = view('gift.selected-gift-list', compact('gifts', 'mails','thankyou_card','collection'))->render();
        return response()->json([
            'status' => true,
            'data' => $gift_items
        ]);
    }

    public function get_gift_summary(Request $request){
        $request->validate([
            'gift_ids'=>'required',
            'priority'=>'required',
            'template_id'=>'required',
            'schedule_days'=>'required',
        ]);
        $data = array();
        $gift_ids = explode(',',$request->gift_ids);
        $data['collection'] = GiftCollectionModel::find($request->collection_id);
        $thankyou_card = ThankYouCardModel::where(['id'=>$request->thank_you_card,'status'=>1])->first();
        $data['card_price'] = isset($thankyou_card)?$thankyou_card->price*count($gift_ids):NULL;
        $data['gift_ids'] = $gift_ids;
        $data['mail_ids'] = explode(',',$request->mail_ids);
        $data['total_price'] = GiftModel::whereIn('id', $gift_ids)->sum('mrp');
        $data['sub_total'] = isset($data['total_price'])?$data['total_price']+$data['card_price']:0;
        $data['total_discount'] = GiftModel::whereIn('id', $gift_ids)->get()
        ->sum(function($gift) {
             return $gift->mrp * ($gift->discount / 100);
        });
        $data['priority_id'] = explode(',',$request->priority);
        $data['template_id'] = explode(',',$request->template_id);
        $data['schedule_days'] = explode(',',$request->schedule_days);
        $gift_summary = view('gift.gift-summary', $data)->render();
        return response()->json(['status'=>true,'data'=>$gift_summary,'msg'=>'Gift Summary Fetched']);
    }
    // store collection
    public function save_gift_collection(Request $request){
        // dd($request->all());
        if($request->collection_id){
            $collection = GiftCollectionModel::find($request->collection_id);
            // dd($collection);
            $msg = 'Gift Collection Updated Successfully!';
        }else{
            $collection = new GiftCollectionModel();
            $msg = 'Gift Collection Created Successfully!';
        }
        // die;
        $collection->title = $request->title;
        $collection->slug = Str::slug($request->title);
        if($request->mail_ids){
            $collection->mail_ids = implode(',',$request->mail_ids);
        }else if($request->gift_ids){
            $collection->gift_ids = implode(',',$request->gift_ids);
        }else{
            return redirect()->back()->with('error','Please Select a gift or mail');
        }
        $collection->tyc_id = $request->thank_you_card;
        $collection->priority = implode(',',$request->priority);
        $collection->tyc_design_ids = implode(',',$request->tyc_design);
        $collection->intervals = implode(',',$request->days);
        $collection->sub_total = $request->sub_total;
        $collection->discount = $request->discount;
        $collection->gst_taxes = $request->gst_taxes;
        $collection->courier_charges = $request->courier_charges;
        $collection->handing_charges = $request->handing_charges;
        $collection->no_of_customers = $request->no_of_customers;
        $collection->payble_amount = $request->payble_amount;
        $collection->created_by = auth()->user()->id;
        $collection->save();
        return redirect()->route('gift.collection')->with('success',$msg);
    }
    public function thank_you_card(Request $request){
        return view('gift.thank-you-card');
    }
    public function thank_you_card_list(Request $request){
        $thankyoucards = ThankYouCardModel::all();
        return view('gift.thank-you-card-list',compact('thankyoucards'));
    }
    public function create_thank_you_card(Request $request){
        return view('gift.add-thank-you-card');
    }
    public function store_thank_you_card(Request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);
        if($request->id){
            $thankyou_card = ThankYouCardModel::find($request->id);
            $msg = 'Thank You Card Updated Successfully!';
        }else{
            $thankyou_card = new ThankYouCardModel();
            $msg = 'Thank You Card Created Successfully!';
        }
        $thankyou_card->name = $request->name;
        $thankyou_card->price = $request->price;
        $thankyou_card->description = $request->description;
        $thankyou_card->status = $request->status;
        $thankyou_card->created_by = auth()->user()->id;
        if($thankyou_card->save()){
            return redirect()->route('gift.thank-you-card-list')->with('success',$msg);
        }else{
            return redirect()->back()->with('error',$msg);
        }
    }
    public function edit_thank_you_card($id){
        $details = ThankYouCardModel::find($id);
        return view('gift.add-thank-you-card',compact('details'));
    }
    public function delete_thank_you_card($id){
        $thankyou_card = ThankYouCardModel::find($id);
        $thankyou_card->delete();
        return redirect()->back()->with('success','Thank You Card Deleted Successfully!');
    }
    public function collection(){
        $collection = new GiftCollectionModel();
        $lists = $collection->all();
        // dd($lists);
        return view('gift.collection',compact('lists'));
    }
    public function delete_gallery($id){
        $collection = GiftCollectionModel::find($id);
        $collection->delete();
        return redirect()->back()->with('success','Gift Collection Deleted Successfully!');
    }
    //gift configuration
    public function gift_config(){
       if(Auth()->user()->hasrole('Agent')){
            return redirect()->back()->with('error','Unauthorized!');
       }
        $lists = GiftConfigModel::all();
        return view('gift.config-list',compact('lists'));
    }
    public function create_gift_config(){
        if(Auth()->user()->hasrole('Agent')){
            return redirect()->back()->with('error','Unauthorized!');
       }
        return view('gift.create-config');
    }
    public function store_gift_config(Request $request){
        if(Auth()->user()->hasrole('Agent')){
            return redirect()->back()->with('error','Unauthorized!');
       }
        $request->validate([
            'title'=>'required',
            'key'=>'required',
            'price'=>'required',
            'status'=>'required',
        ]);
        if($request->id){
            $config = GiftConfigModel::find($request->id);
            $msg = 'Gift Config Updated Successfully!';
        }else{
            $config = new GiftConfigModel();
            $msg = 'Gift Config Created Successfully!';
            $config->key = $request->key;
        }
        $config->title = $request->title;
        $config->price = $request->price;
        $config->status = $request->status;
        $config->created_by = auth()->user()->id;
        $config->save();
        return redirect()->route('gift.config.index')->with('success',$msg);
    }
    public function edit_gift_config($id){
        $details = GiftConfigModel::find($id);
        return view('gift.create-config',compact('details'));
    }
    public function delete_gift_config($id){
        $config = GiftConfigModel::find($id);
        if($config){
            $config->delete();
            return redirect()->back()->with('success', 'Gift Config deleted successfully.');
        }
        return redirect()->back()->with('error', 'Gift Config delet failed.');
    }

}