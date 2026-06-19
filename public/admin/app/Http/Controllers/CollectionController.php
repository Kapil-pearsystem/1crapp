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


use App\Models\CampaignSchedule;
use App\Models\CampaignModel;
use App\Models\Customer;
use App\Models\UserGiftModel;
use App\Models\AuthTempModel;
use App\Mail\CampaignCustomerMail;
use App\Mail\AdminGiftMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
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
    public function delete(Request $request, $id)
    {
        $collection = CollectionModel::find($id);
    
        if (!$collection || $collection->created_by != Auth::id()) {
            return redirect()->back()->with('error', 'Collection not found.');
        }
    
        // Get campaign IDs for this collection
        $campaignIds = CampaignModel::where('coll_id', $id)->pluck('id')->toArray();
    
        // Delete campaign schedules
        CampaignSchedule::whereIn('campaign_id', $campaignIds)->delete();
    
        // Delete campaigns
        CampaignModel::where('coll_id', $id)->delete();
    
        // Delete collection items
        CollectionItemModel::where('collection_id', $id)->delete();
    
        // Delete collection
        $collection->delete();
    
        return redirect()->route('collection.index')->with('success', 'Collection deleted successfully.');
    }
    public function getGiftMail(){
            $fromTime = now()->copy()->subHours(2)->format('H:i:s');
            $toTime   = now()->copy()->addHours(2)->format('H:i:s');
    
            // Log::info("Searching schedules between {$fromTime} and {$toTime}");
            // dd($fromTime, $toTime);
             $items = CampaignSchedule::where('status', 'pending')
                ->whereDate('start_date', now()->toDateString())
                // ->whereBetween('schedule_time', [$fromTime, $toTime])
                ->get();
                dd($items);
    
            // Log::info('Schedules found: '.$items->count());
    
            foreach ($items as $item) {
    
                // Log::info("Processing Schedule ID: {$item->id}");
    
                // email
                // if ($item->type == 'email') {
                //     Log::info("Email schedule detected");
    
                //     $collectionItem = CollectionItemModel::find($item->item_id);
    
                //     if (!$collectionItem) {
                //         Log::error("Collection Item not found: {$item->item_id}");
                //         continue;
                //     }
    
                //     Log::info("Collection Item Found: {$collectionItem->id}");
    
                //     if ($collectionItem->postal_type != '1') {
                //         Log::info("Postal type is not email");
                //         continue;
                //     }
    
                //     $campaign = CampaignModel::find($item->campaign_id);
    
                //     if (!$campaign) {
                //         Log::error("Campaign not found: {$item->campaign_id}");
                //         continue;
                //     }
    
                //     Log::info("Campaign Found: {$campaign->id}");
    
                //     $customers = Customer::join('tbl_user_list', 'tbl_user_list.user_id', '=', 'users.id')
                //         ->where('users.agent_id', $campaign->created_by)
                //         ->where('tbl_user_list.list_id', $campaign->list_id)
                //         ->distinct()
                //         ->select('users.name', 'users.email')
                //         ->get();
    
                //     Log::info("Customers Found: ".$customers->count());
    
                //     if ($customers->isNotEmpty()) {
    
                //         $mail = GiftMailModel::find($collectionItem->item_id);
    
                //         if (!$mail) {
                //             Log::error("Gift Mail not found: {$collectionItem->item_id}");
                //             continue;
                //         }
    
                //         Log::info("Gift Mail Found: {$mail->id}");
    
                //         $maildata = $mail->toArray();
    
                //         foreach ($customers as $customer) {
                            
                //             $maildata = [
                //                 'name' => $customer->name,
                //                 'logo' => $mail->logo,
                //                 'mail_title' => $mail->title,
                //                 'mail' => $mail,
                //                 'subject' => $mail->subject,
                //             ];
                //             Log::info("Sending mail to: {$customer->email}");
    
                //             try {
                //                 Mail::to($customer->email)
                //                     ->cc(['1crappcampaign@yopmail.com'])
                //                     ->send(new CampaignCustomerMail($maildata));
    
                //                 Log::info("Mail Sent Successfully: {$customer->email}");
    
                //             } catch (\Exception $e) {
    
                //                 Log::error("Mail Failed: {$customer->email}");
                //                 Log::error($e->getMessage());
                //             }
                //         }
                //     } else {
                //         Log::warning("No customers found for Campaign ID: {$campaign->id}");
                //     }
                // }else{
                    // gift
                    // Log::info("Gift schedule detected");
    
                    $collectionGiftItem = CollectionItemModel::find($item->item_id);
                    // dd($item->item_id);
                    if (!$collectionGiftItem) {
                        // Log::error("Collection Item not found: {$item->item_id}");
                        continue;
                    }
    
                    // Log::info("Collection Item Found: {$collectionGiftItem->id}");
    
                    if ($collectionGiftItem->postal_type != '2') {
                        Log::info("Postal type is not gift");
                        continue;
                    }
    
                    $campaign = CampaignModel::find($item->campaign_id);
                    $collection = CollectionModel::withCount('gifts')->find($collectionGiftItem->collection_id);
                    if (!$campaign) {
                        // Log::error("Campaign not found: {$item->campaign_id}");
                        continue;
                    }
    
                    // Log::info("Campaign Found: {$campaign->id}");
    
                    $customers = Customer::join('tbl_user_list', 'tbl_user_list.user_id', '=', 'users.id')
                        ->where('users.agent_id', $campaign->created_by)
                        ->where('tbl_user_list.list_id', $campaign->list_id)
                        ->distinct()
                        ->select('users.id','users.memberid', 'users.name', 'users.email')
                        ->get();
    
                    // Log::info("Customers Found: ".$customers->count());
                    $total_customer = $customers->count();
                    if ($customers->isNotEmpty()) {
    
                        $gift = GiftModel::with('giftcategory')->find($collectionGiftItem->item_id);
                        $thankyouStatus = false;
                        $tyc_category = 'TYC';
                        $tyc_name = '';
                        $tyc_price = 0;
                        if($collectionGiftItem->thankYouStatus == 1){
                            $thankyouStatus = true;
                            $thankyouCard = ThankYouCardModel::find($collectionGiftItem->tyc_id);
                            $tyc_name = $thankyouCard->name;
                            $tyc_price = $thankyouCard->price;
                        }
                        // dd($gift->giftcategory);
                        if (!$gift) {
                            Log::error("Gift not found: {$collectionGiftItem->item_id}");
                            continue;
                        }
                        // Log::info("Gift Found: {$gift->id}");
                        $giftdata = $gift->toArray();
                        $gst = (float) (GiftConfigModel::where('key', 'gst')->value('price') ?? 0);
                        $courier = (float) (GiftConfigModel::where('key', 'courier')->value('price') ?? 0);
                        $handing = (float) (GiftConfigModel::where('key', 'handing')->value('price') ?? 0);
                        $adminmail = AuthTempModel::where('category', 5)->first();
                        // $maildata = $adminmail->toArray();
                        foreach ($customers as $customer) {
                        
                            // try {
                        
                            //     Log::info("Processing Gift For Customer ID: {$customer->id}");
                                $mrp = (float) $gift->mrp;
                                $discount = (float) $gift->discount;
                                // Discount Amount
                                $discountAmount = ($mrp * $discount) / 100;
                                // Price after discount
                                $discountedPrice = $mrp - $discountAmount;
                                // GST Amount
                                $gstAmount = ($discountedPrice * $gst) / 100;
                                // Final Price
                                $finalPrice = $discountedPrice + $gstAmount + $courier + $handing;
                            //     UserGiftModel::create([
                            //         'collection_id'  => $collectionGiftItem->collection_id,
                            //         'item_id'  => $item->item_id,
                            //         'user_id'  => $customer->id,
                            //         'gift_id'  => $gift->id,
                            //         'agent_id' => $campaign->created_by,
                            //         'price'    => round($finalPrice, 2),
                            //         'status'   => 'pending',
                            //     ]);
                        
                            //     Log::info(
                            //         "Gift Order Created | Customer: {$customer->id} | Gift: {$gift->id} | Price: {$finalPrice}"
                            //     );
                        
                            // } catch (\Exception $e) {
                        
                            //     Log::error("Gift Order Creation Failed");
                        
                            //     Log::error([
                            //         'customer_id' => $customer->id ?? null,
                            //         'gift_id'     => $gift->id ?? null,
                            //         'message'     => $e->getMessage(),
                            //         'file'        => $e->getFile(),
                            //         'line'        => $e->getLine(),
                            //     ]);
                        
                            //     continue;
                            // }
                            // dd($adminmail);
                            $maildata = [
                                'name'           => $customer->name,
                                'email'          => $customer->email,
                                'memberid'       => $customer->memberid,
                                'campaign_title' => $campaign->title,
                                'collection_name'=> $collection->title,
                                'total_gifts'    => $collection->gifts_count,
                                'total_customers'=> $total_customer,
                                'gross_value'    => $finalPrice,
                                'gift_name'      => $gift->title,
                                'gift_category'  => $gift->giftcategory->name,
                                'gift_mrp'       => $gift->mrp,
                                'tyc_category'   => $tyc_category,
                                'tyc_name'       => $tyc_name,
                                'tyc_price'      => $tyc_price,
                                'tyc_status'     => $thankyouStatus,
                                'sub_total'      => $gift->mrp,
                                'discount'       => $discount,
                                'total_after_discount'=> $gift->mrp-$discount,
                                'courier_charge'=> $courier,
                                'handling_charge'=> $handing,
                                'gst_percent'=> $gst,
                                'gst_charge'=> $gstAmount,
                                'total_amount_pr_user'=> $finalPrice,
                                'gross_order_amount'=> $finalPrice,
                                'title'          => $adminmail->title,
                                'subject'        => $adminmail->subject,
                                'logo'           => $adminmail->logo,
                                'top_content'    => $adminmail->top_content,
                                'bottom_content' => $adminmail->bottom_content,
                                'copyright_text' => $adminmail->copyright_text,
                            ];
                            // dd($maildata);
                            return view('mail-temp.admin-gift-mail',['data'=> $maildata]);
                            Log::info("Sending mail to: {$customer->email}");
    
                            try {
                                Mail::to($customer->email)
                                    ->cc(['1crappcampaigngift@yopmail.com'])
                                    ->send(new AdminGiftMail($maildata));
    
                                Log::info("Gift Mail Sent Successfully: {$customer->email}");
    
                            } catch (\Exception $e) {
    
                                Log::error("Mail Failed: {$customer->email}");
                                Log::error($e->getMessage());
                            }
                        }
                        
                    } else {
                        Log::warning("No customers found for Campaign ID: {$campaign->id}");
                    }
                    
                // }
    
                // $item->update([
                //     'status' => 'completed',
                //     'sent_at' => now(),
                // ]);
    
                // Log::info("Schedule Completed: {$item->id}");
            }
    
            // Log::info('Gift Mail Cron Finished Successfully');
    
        
    }
}