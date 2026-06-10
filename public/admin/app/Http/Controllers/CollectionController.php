<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\GiftCategoryModel;
use App\Models\MailCategoryModel;
use App\Models\GiftMailModel;
use App\Models\GiftModel;
use App\Models\CollectionModel;
use App\Models\CollectionItemModel;
use App\Models\ThankYouCardModel;
use App\Models\GiftConfigModel;
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
class CollectionController extends Controller
{
    public function index(){
        $lists = CollectionModel::withCount('emails', 'gifts')->orderBy('id','DESC')->where('created_by', Auth::id())->get();
        return view('collection.index',compact('lists'));
    }
    public function create(){
        $config = GiftConfigModel::pluck('price', 'key')->toArray();
        // dd($config);
        $mailCategories = MailCategoryModel::select('id', 'title as name')->orderBy('id','DESC')->where('status', 1)->where('created_by', Auth::id())->get();
        $giftCategories = GiftCategoryModel::select('id', 'name')->orderBy('id','DESC')->where('status', 1)->where('created_by', Auth::id())->get();
        // dd($mailCategories, $giftCategories);
        $categories = GiftCategoryModel::all();
        //  $thankyou_card = ThankYouCardModel::where('status',1)->get();
        // dd($thankyou_card);
        return view('collection.create',compact('categories', 'mailCategories', 'giftCategories', 'config'));
    }
    public function save(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->collection_id){
            $collection = CollectionModel::find($request->collection_id);
            $collection->seqID = $this->generateSeqID();
            $msg = 'Collection updated successfully.';
        }else{
            $collection = new CollectionModel();
            $msg = 'Collection created successfully.';
            $collection->seqID = $this->generateSeqID();
        }
        $collection->title = $request->title;
        $collection->total = $request->total;
        $collection->discount = $request->total_discount;
        $collection->final_total = $request->final_total;
        $collection->courier = $request->courier;
        $collection->handling = $request->handling;
        $collection->gst = $request->gst;
        $collection->gross_amount = $request->gross_amount;
        $collection->status = 1;
        $collection->created_by = Auth::id();
        $collection->save();

        $collectionItems = [];
        $itemIds = $request->item_id ?? [];   // keyed by set index
        if (!empty($itemIds) && is_array($itemIds)) {
            foreach ($itemIds as $setIndex => $itemId) {
                if (empty($itemId)) continue;  // nothing selected in this set

                $postalType = $request->type[$setIndex] ?? null;
                $catId  = $request->mail_category[$setIndex] ?? $request->gift_category[$setIndex] ?? null;

                $collectionItems[] = [
                    'collection_id' => $collection->id,
                    'set_index'     => $setIndex,
                    'postal_type'   => $postalType,
                    'category'      => $catId,
                    'availability'  => $request->availability[$setIndex] ?? null,
                    'discount'      => $request->discount[$setIndex] ?? null,
                    'thankYouStatus'=> $request->thankYouStatus[$setIndex] ?? 0,
                    'tyc_id'        => $request->tyc_id[$setIndex] ?? 0,
                    'schedule_day'  => $request->schedule_day[$setIndex] ?? 0,
                    'schedule_time'  => $request->schedule_time[$setIndex] ?? null,
                    'item_id'       => $itemId,
                    'created_by'    => Auth::id(),
                ];
            }
        }
        // dd($collectionItems);
        CollectionItemModel::where('collection_id', $collection->id)->delete();
        if(!empty($collectionItems)){
            CollectionItemModel::insert($collectionItems);
        }

        return redirect()->route('collection.index')->with('success', $msg);
    }
    private function generateSeqID(){
        
        $seqID = 'SEQ-' . strtoupper(Str::random(8)); // Generate a random sequence ID
        $collection = CollectionModel::where('seqID', $seqID)->exists();
        if($collection){
            return $this->generateSeqID(); // Regenerate if it already exists
        }
        return $seqID;

    }

    public function filter(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'postal_type' => 'nullable|string',
            'mail_category' => 'nullable|string',
            'gift_category' => 'nullable|string',
            'availability' => 'nullable|string',
            'discount' => 'nullable|numeric',
            'filter_text' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid filter data.',
                'errors' => $validator->errors(),
            ]);
        }
        
        // Extract filter parameters
        $setIndex = $request->input('set_index');
        $postalType = $request->input('postal_type');
        $mailCategory = $request->input('mail_category');
        $giftCategory = $request->input('gift_category');
        $availability = $request->input('availability');
        $discount = $request->input('discount');
        $filterText = $request->input('filter_text');
        $collectionId = $request->input('collection_id');
        $total_loaded = $request->total ?: 0; // Number of items already loaded
        $page = $request->page ?: 1; // Current page
        $limit = 6; // Items per page
        $offset = ($page - 1) * $limit; // Calculate offset based on page number
        // Build the query based on the filters
        // return response()->json([
        //     'status' => true,
        //     'data' => [
        //         'postal_type' => $postalType,
        //         'mail_category' => $mailCategory,
        //         'gift_category' => $giftCategory,
        //         'availability' => $availability,
        //         'discount' => $discount,
        //         'filter_text' => $filterText,
        //     ],
        //     'message' => 'Filter applied successfully.',
        // ]);
        
        $collectionItems = CollectionItemModel::where('collection_id', $collectionId)->get();
        $s_mail_ids = $collectionItems->where('postal_type', 1)->pluck('item_id')->toArray()??[];
        $s_gift_ids = $collectionItems->where('postal_type', 2)->pluck('item_id')->toArray()??[];
        
        $data = '';
        $count = 0;
        if($postalType == 1){
            // load email data
            $mailData = GiftMailModel::select('tbl_giftmail.*', 'tbl_mailcategory.title as category_name')
            ->join('tbl_mailcategory', 'tbl_mailcategory.id', '=', 'tbl_giftmail.category')
            ->where('tbl_giftmail.category', $mailCategory)
            ->where('tbl_giftmail.created_by', Auth::id());
            if($filterText) {
                $mailData->where(function($q) use ($filterText) {
                    $q->where('tbl_giftmail.title', 'like', "%$filterText%")
                      ->orWhere('tbl_giftmail.subject', 'like', "%$filterText%")
                      ->orWhere('tbl_mailcategory.title', 'like', "%$filterText%");
                });
            }
            // if($availability) {
            //     $mailData->where('tbl_giftmail.availability', $availability);
            // }
            // if($discount) {
            //     $mailData->where('tbl_giftmail.discount', '<=', $discount);
            // }
            // $mailData->offset($offset)->limit($limit);
            
            if (!is_null($s_mail_ids) && count($s_mail_ids) > 0) {
                $mailData = $mailData->orderByRaw("FIELD(tbl_giftmail.id, " . implode(',', $s_mail_ids) . ") DESC")
                ->orderBy('tbl_giftmail.id');
            }
            $mailData = $mailData->where('tbl_giftmail.status', 1)->get();
            // $total_loaded = $total_loaded + $mailData->count();
            // if($mailData->count() > $limit){
            //     $page = $page + 1;
            // }
            $count = $mailData->count();
            $data = view('collection.partials.filtered-mails', compact('mailData', 'setIndex', 'collectionId'))->render();
        }else if($postalType == 2){
            $total_gift = $request->total_gift ?: 0; // Number of items already loaded
            $page = $request->page ?: 1; // Current page
            $limit = 6; // Items per page
            $offset = ($page - 1) * $limit; // Calculate offset based on page number
            $gifts = GiftModel::select('tbl_gift.*', 'gift_category.name as category')
                ->leftjoin('gift_category', 'gift_category.id', '=', 'tbl_gift.category');
            if ($giftCategory) {
                $gifts = $gifts->where('tbl_gift.category', $giftCategory);
            }
            if ($availability) {
                $availability = ($availability === '1') ? 'available' : 'sold out';
                $gifts = $gifts->where('tbl_gift.ribbon', $availability);
            }
            if ($discount) {
                $gifts = $gifts->where('tbl_gift.discount','<=', $discount);
            }
            if ($filterText) {
                // dd($search);
                $gifts = $gifts->where(function ($query) use ($filterText) {
                    $query->where('tbl_gift.title', 'like', "%$filterText%")
                        ->orWhere('tbl_gift.description', 'like', "%$filterText%");
                });
            }
            // Apply pagination
            if (!is_null($s_gift_ids) && count($s_gift_ids) > 0) {
                $gifts = $gifts->orderByRaw("FIELD(tbl_gift.id, " . implode(',', $s_gift_ids) . ") DESC")
                ->orderBy('tbl_gift.id');
                // ->limit($limit)->offset($offset);
            }
            $gifts = $gifts->where('tbl_gift.status', 1)->get();
            $count = $gifts->count();
            if ($count > 0) {
                $data = view('collection.partials.filtered-gifts', compact('gifts', 's_gift_ids', 'setIndex', 'collectionId'))->render();
            }
        }
        // Return the filtered results as JSON
        return response()->json([
            'status' => true,
            'count' => $count,
            'data' => $data??'<p class="text-center">No results found.</p>',
            'message' => 'Filter applied successfully.',
        ]);
    }

    public function edit(Request $request, $id){
        $config = GiftConfigModel::pluck('price', 'key')->toArray();
        $collection = CollectionModel::find($id);
        if(!$collection || $collection->created_by != Auth::id()){
            return redirect()->route('collection.index')->with('error', 'Collection not found.');
        }
        $mailCategories = MailCategoryModel::select('id', 'title as name')->orderBy('id','DESC')->where('status', 1)->where('created_by', Auth::id())->get();
        $giftCategories = GiftCategoryModel::select('id', 'name')->orderBy('id','DESC')->where('status', 1)->where('created_by', Auth::id())->get();
        $collectionItems = CollectionItemModel::where('collection_id', $id)->get();
        // dd($collectionItems);
        return view('collection.create',compact('collection', 'mailCategories', 'giftCategories', 'collectionItems', 'config'));
    }
    public function delete(Request $request, $id){
        $collection = CollectionModel::find($id);
        if(!$collection || $collection->created_by != Auth::id()){
            return redirect()->back()->with('error', 'Collection not found.');
        }
        CollectionItemModel::where('collection_id', $id)->delete();
        $collection->delete();
        return redirect()->route('collection.index')->with('success', 'Collection deleted successfully.');
     }
}