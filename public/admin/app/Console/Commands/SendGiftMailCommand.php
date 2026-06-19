<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CollectionItemModel;
use App\Models\CampaignSchedule;
use App\Models\GiftMailModel;
use App\Models\CampaignDeliveryLog;
use App\Models\CampaignModel;
use App\Models\Customer;
use App\Models\UserGiftModel;
use App\Models\GiftModel;
use App\Models\GiftConfigModel;
use App\Models\AuthTempModel;
use App\Models\CollectionModel;
use App\Models\ThankYouCardModel;
use App\Mail\CampaignCustomerMail;
use App\Mail\AdminGiftMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SendGiftMailCommand extends Command
{
    protected $signature = 'gift:send-mail';
    protected $description = 'Send scheduled gift emails';

    public function handle()
    {
        Log::info("========================================");
        Log::info("CAMPAIGN JOB STARTED: " . now());
        Log::info("========================================");

        $gst     = (float) (GiftConfigModel::where('key', 'gst')->value('price') ?? 0);
        $courier = (float) (GiftConfigModel::where('key', 'courier')->value('price') ?? 0);
        $handing = (float) (GiftConfigModel::where('key', 'handing')->value('price') ?? 0);

        Log::info("CONFIG LOADED", [
            'gst'     => $gst,
            'courier' => $courier,
            'handing' => $handing,
        ]);

        $adminmail = AuthTempModel::where('category', 5)->first();
        if (!$adminmail) {
            Log::error("FATAL: Admin mail template not found (category 5). Aborting job.");
            return;
        }
        Log::info("Admin mail template loaded: [{$adminmail->id}] {$adminmail->subject}");

        /*
        |--------------------------------------------------------------------------
        | Active campaigns
        |--------------------------------------------------------------------------
        */
        $campaigns = CampaignModel::where('status', '1')->get();
        Log::info("Total active campaigns found: " . $campaigns->count());

        if ($campaigns->isEmpty()) {
            Log::info("No active campaigns. Job ending early.");
            return;
        }

        foreach ($campaigns as $campaign) {

            Log::info("----------------------------------------");
            Log::info("PROCESSING CAMPAIGN: [{$campaign->id}] {$campaign->title}");
            Log::info("----------------------------------------");

            $collection = CollectionModel::withCount('gifts')->find($campaign->coll_id);
            if (!$collection) {
                Log::error("Collection not found for campaign [{$campaign->id}], coll_id: {$campaign->coll_id}. Skipping.");
                continue;
            }
            Log::info("Collection loaded: [{$collection->id}] {$collection->title} | Total gifts: {$collection->gifts_count}");

            $collectionItems = CollectionItemModel::where('collection_id', $campaign->coll_id)
                ->orderBy('schedule_day')
                ->orderBy('schedule_time')
                ->get();

            Log::info("Collection items found: " . $collectionItems->count());

            if ($collectionItems->isEmpty()) {
                Log::warning("No collection items for campaign [{$campaign->id}]. Skipping.");
                continue;
            }

            $customers = Customer::join('tbl_user_list', 'tbl_user_list.user_id', '=', 'users.id')
                ->where('tbl_user_list.list_id', $campaign->list_id)
                ->select(
                    'users.id',
                    'users.name',
                    'users.email',
                    'users.memberid',
                    'tbl_user_list.created_at as joined_at'
                )
                ->get();

            $total_customer = $customers->count();
            Log::info("Total customers in list [{$campaign->list_id}]: {$total_customer}");

            if ($customers->isEmpty()) {
                Log::warning("No customers found for campaign [{$campaign->id}], list_id: {$campaign->list_id}. Skipping.");
                continue;
            }

            /*
            |----------------------------------------------------------------------
            | Load ALL delivery logs for this campaign at once (N+1 fix)
            |----------------------------------------------------------------------
            */
            $allDeliveryLogs = CampaignDeliveryLog::where('campaign_id', $campaign->id)
                ->get()
                ->groupBy('user_id');

            Log::info("Delivery logs loaded for campaign [{$campaign->id}] | Unique users with logs: " . $allDeliveryLogs->count());

            foreach ($customers as $customer) {

                Log::info("  >> CUSTOMER: [{$customer->id}] {$customer->name} | {$customer->email}");

                $sentItemIds = $allDeliveryLogs
                    ->get($customer->id, collect())
                    ->pluck('collection_item_id')
                    ->toArray();

                Log::info("     Already sent item IDs: " . (empty($sentItemIds) ? 'none' : implode(', ', $sentItemIds)));

                foreach ($collectionItems as $indexItem => $item) {

                    Log::info("     -- ITEM [{$item->id}] Day: {$item->schedule_day} | Time: {$item->schedule_time} | Type: {$item->postal_type}");

                    // Skip already sent
                    if (in_array($item->id, $sentItemIds)) {
                        Log::info("        SKIP: Already sent to this customer.");
                        continue;
                    }

                    // Previous item check
                    if ($indexItem > 0) {
                        $prevItemId = $collectionItems[$indexItem - 1]->id;
                        $prevSent = $allDeliveryLogs
                            ->get($customer->id, collect())
                            ->contains('collection_item_id', $prevItemId);

                        Log::info("        Previous item ID: {$prevItemId} | Sent: " . ($prevSent ? 'YES' : 'NO'));

                        if (!$prevSent) {
                            Log::info("        SKIP: Previous item not yet sent. Sequence not complete.");
                            continue;
                        }
                    }

                    /*
                    |--------------------------------------------------------------
                    | Date check
                    |--------------------------------------------------------------
                    */
                    $userStartDate = Carbon::parse($campaign->start_date);
                    $sendDate      = $userStartDate->copy()->addDays($item->schedule_day);

                    Log::info("        Campaign start: {$userStartDate} | Scheduled send date: {$sendDate} | Today: " . now()->toDateString());

                    if (!now()->isSameDay($sendDate)) {
                        Log::info("        SKIP: Date mismatch. Expected: {$sendDate->toDateString()} | Today: " . now()->toDateString());
                        continue;
                    }

                    Log::info("        Date matched!");

                    /*
                    |--------------------------------------------------------------
                    | Time check
                    |--------------------------------------------------------------
                    */
                    if ($item->schedule_time) {
                        $scheduleToday = Carbon::createFromFormat(
                            'Y-m-d H:i:s',
                            now()->format('Y-m-d') . ' ' . $item->schedule_time
                        );
                        $fromTime = now()->copy()->subHours(2);
                        $toTime   = now()->copy()->addHours(2);

                        Log::info("        Time window: {$fromTime} to {$toTime} | Scheduled time: {$scheduleToday}");

                        if (!$scheduleToday->between($fromTime, $toTime)) {
                            Log::info("        SKIP: Outside time window.");
                            continue;
                        }

                        Log::info("        Time matched!");
                    } else {
                        Log::info("        No schedule_time set — skipping time check.");
                    }

                    /*
                    |==============================================================
                    | MAIL (postal_type = 1)
                    |==============================================================
                    */
                    if ($item->postal_type == '1') {

                        Log::info("        TYPE: MAIL");

                        $mail = GiftMailModel::find($item->item_id);
                        if (!$mail) {
                            Log::error("        ERROR: GiftMailModel not found for item_id: {$item->item_id}. Skipping.");
                            continue;
                        }

                        Log::info("        Mail template found: [{$mail->id}] {$mail->subject}");

                        $maildata = [
                            'name'       => $customer->name,
                            'logo'       => $mail->logo,
                            'mail_title' => $mail->title,
                            'mail'       => $mail,
                            'subject'    => $mail->subject,
                        ];

                        Log::info("        Attempting to send mail to: {$customer->email}");

                        try {
                            Mail::to($customer->email)
                                ->cc(['1crappcampaign@yopmail.com'])
                                ->send(new CampaignCustomerMail($maildata));

                            Log::info("        SUCCESS: Mail sent to {$customer->email}");

                            CampaignDeliveryLog::create([
                                'campaign_id'        => $campaign->id,
                                'user_id'            => $customer->id,
                                'collection_item_id' => $item->id,
                                'type'               => 'mail',
                                'sent_at'            => now(),
                            ]);

                            Log::info("        Delivery log created for customer [{$customer->id}] item [{$item->id}]");

                            // Update in-memory log
                            if (!$allDeliveryLogs->has($customer->id)) {
                                $allDeliveryLogs->put($customer->id, collect());
                            }
                            $allDeliveryLogs->get($customer->id)->push((object)[
                                'collection_item_id' => $item->id
                            ]);

                        } catch (\Exception $e) {
                            Log::error("        FAILED: Mail not sent to {$customer->email}");
                            Log::error("        Exception: " . $e->getMessage());
                            Log::error("        File: " . $e->getFile() . " | Line: " . $e->getLine());
                        }
                    }

                    /*
                    |==============================================================
                    | GIFT (postal_type = 2)
                    |==============================================================
                    */
                    if ($item->postal_type == '2') {

                        Log::info("        TYPE: GIFT");

                        $gift = GiftModel::with('giftcategory')->find($item->item_id);
                        if (!$gift) {
                            Log::error("        ERROR: GiftModel not found for item_id: {$item->item_id}. Skipping.");
                            continue;
                        }

                        Log::info("        Gift found: [{$gift->id}] {$gift->title} | MRP: {$gift->mrp} | Discount: {$gift->discount}%");

                        // Thank You Card
                        $thankyouStatus = false;
                        $tyc_category   = 'TYC';
                        $tyc_name       = '';
                        $tyc_price      = 0;

                        if ($item->thankYouStatus == 1) {
                            Log::info("        Thank You Card enabled. tyc_id: {$item->tyc_id}");
                            $thankyouCard = ThankYouCardModel::find($item->tyc_id);
                            if ($thankyouCard) {
                                $thankyouStatus = true;
                                $tyc_name       = $thankyouCard->name;
                                $tyc_price      = $thankyouCard->price;
                                Log::info("        Thank You Card loaded: {$tyc_name} | Price: {$tyc_price}");
                            } else {
                                Log::error("        WARNING: ThankYouCard not found for tyc_id: {$item->tyc_id}. Continuing without it.");
                            }
                        } else {
                            Log::info("        Thank You Card: not enabled.");
                        }

                        // Price calculation
                        $mrp             = (float) $gift->mrp;
                        $discount        = (float) $gift->discount;
                        $discountAmount  = ($mrp * $discount) / 100;
                        $discountedPrice = $mrp - $discountAmount;
                        $gstAmount       = ($discountedPrice * $gst) / 100;
                        $finalPrice      = round($discountedPrice + $gstAmount + $courier + $handing, 2);

                        Log::info("        PRICE BREAKDOWN", [
                            'mrp'              => $mrp,
                            'discount_%'       => $discount,
                            'discount_amount'  => $discountAmount,
                            'after_discount'   => $discountedPrice,
                            'gst_%'            => $gst,
                            'gst_amount'       => $gstAmount,
                            'courier'          => $courier,
                            'handling'         => $handing,
                            'final_price'      => $finalPrice,
                        ]);

                        // Create gift order
                        try {
                            Log::info("        Creating UserGiftModel for customer [{$customer->id}] gift [{$gift->id}]");

                            UserGiftModel::create([
                                'collection_id' => $item->collection_id,
                                'item_id'       => $item->item_id,
                                'user_id'       => $customer->id,
                                'gift_id'       => $gift->id,
                                'agent_id'      => $campaign->created_by,
                                'price'         => $finalPrice,
                                'status'        => 'pending',
                            ]);

                            Log::info("        SUCCESS: Gift order created | Customer: [{$customer->id}] | Gift: [{$gift->id}] | Price: {$finalPrice}");

                        } catch (\Exception $e) {
                            Log::error("        FAILED: Gift order creation failed", [
                                'customer_id' => $customer->id ?? null,
                                'gift_id'     => $gift->id ?? null,
                                'message'     => $e->getMessage(),
                                'file'        => $e->getFile(),
                                'line'        => $e->getLine(),
                            ]);
                            continue;
                        }

                        // Send admin gift mail
                        $maildata = [
                            'name'                 => $customer->name,
                            'email'                => $customer->email,
                            'memberid'             => $customer->memberid,
                            'campaign_title'       => $campaign->title,
                            'collection_name'      => $collection->title,
                            'total_gifts'          => $collection->gifts_count,
                            'total_customers'      => $total_customer,
                            'gross_value'          => $finalPrice,
                            'gift_name'            => $gift->title,
                            'gift_category'        => $gift->giftcategory->name,
                            'gift_mrp'             => $mrp,
                            'tyc_category'         => $tyc_category,
                            'tyc_name'             => $tyc_name,
                            'tyc_price'            => $tyc_price,
                            'tyc_status'           => $thankyouStatus,
                            'sub_total'            => $mrp,
                            'discount'             => $discount,
                            'total_after_discount' => $discountedPrice,
                            'courier_charge'       => $courier,
                            'handling_charge'      => $handing,
                            'gst_percent'          => $gst,
                            'gst_charge'           => $gstAmount,
                            'total_amount_pr_user' => $finalPrice,
                            'gross_order_amount'   => $finalPrice,
                            'title'                => $adminmail->title,
                            'subject'              => $adminmail->subject,
                            'logo'                 => $adminmail->logo,
                            'top_content'          => $adminmail->top_content,
                            'bottom_content'       => $adminmail->bottom_content,
                            'copyright_text'       => $adminmail->copyright_text,
                        ];

                        Log::info("        Attempting to send gift admin mail for customer: {$customer->email}");

                        try {
                            Mail::to('orders@1crapp.com')
                                ->cc(['1crappgiftorders@yopmail.com'])
                                ->send(new AdminGiftMail($maildata));

                            Log::info("        SUCCESS: Gift admin mail sent for customer [{$customer->id}] {$customer->email}");

                            CampaignDeliveryLog::create([
                                'campaign_id'        => $campaign->id,
                                'user_id'            => $customer->id,
                                'collection_item_id' => $item->id,
                                'type'               => 'gift',
                                'sent_at'            => now(),
                            ]);

                            Log::info("        Delivery log created for customer [{$customer->id}] item [{$item->id}]");

                            // Update in-memory log
                            if (!$allDeliveryLogs->has($customer->id)) {
                                $allDeliveryLogs->put($customer->id, collect());
                            }
                            $allDeliveryLogs->get($customer->id)->push((object)[
                                'collection_item_id' => $item->id
                            ]);

                        } catch (\Exception $e) {
                            Log::error("        FAILED: Gift admin mail not sent for {$customer->email}");
                            Log::error("        Exception: " . $e->getMessage());
                            Log::error("        File: " . $e->getFile() . " | Line: " . $e->getLine());
                        }
                    }
                }

                Log::info("  << CUSTOMER DONE: [{$customer->id}] {$customer->name}");
            }

            Log::info("CAMPAIGN DONE: [{$campaign->id}] {$campaign->title}");
            Log::info("----------------------------------------");
        }

        Log::info("========================================");
        Log::info("CAMPAIGN JOB FINISHED: " . now());
        Log::info("========================================");
    }
    // public function handle()
    // {
    //     Log::info('Gift Mail Cron Started');
    
    //     try {
    
    //         $fromTime = now()->copy()->subHours(2)->format('H:i:s');
    //         $toTime   = now()->copy()->addHours(2)->format('H:i:s');
    
    //         Log::info("Searching schedules between {$fromTime} and {$toTime}");
    
    //         $items = CampaignSchedule::where('status', 'pending')
    //             ->whereDate('start_date', now()->toDateString())
    //             ->whereBetween('schedule_time', [$fromTime, $toTime])
    //             ->get();
    
    //         Log::info('Schedules found: '.$items->count());
    
    //         foreach ($items as $item) {
    
    //             Log::info("Processing Schedule ID: {$item->id}");
    
    //             // email
    //             if ($item->type == 'email') {
    //                 Log::info("Email schedule detected");
    
    //                 $collectionItem = CollectionItemModel::find($item->item_id);
    
    //                 if (!$collectionItem) {
    //                     Log::error("Collection Item not found: {$item->item_id}");
    //                     continue;
    //                 }
    
    //                 Log::info("Collection Item Found: {$collectionItem->id}");
    
    //                 if ($collectionItem->postal_type != '1') {
    //                     Log::info("Postal type is not email");
    //                     continue;
    //                 }
    
    //                 $campaign = CampaignModel::find($item->campaign_id);
    
    //                 if (!$campaign) {
    //                     Log::error("Campaign not found: {$item->campaign_id}");
    //                     continue;
    //                 }
    
    //                 Log::info("Campaign Found: {$campaign->id}");
    
    //                 $customers = Customer::join('tbl_user_list', 'tbl_user_list.user_id', '=', 'users.id')
    //                     ->where('users.agent_id', $campaign->created_by)
    //                     ->where('tbl_user_list.list_id', $campaign->list_id)
    //                     ->distinct()
    //                     ->select('users.name', 'users.email')
    //                     ->get();
    
    //                 Log::info("Customers Found: ".$customers->count());
    
    //                 if ($customers->isNotEmpty()) {
    
    //                     $mail = GiftMailModel::find($collectionItem->item_id);
    
    //                     if (!$mail) {
    //                         Log::error("Gift Mail not found: {$collectionItem->item_id}");
    //                         continue;
    //                     }
    
    //                     Log::info("Gift Mail Found: {$mail->id}");
    
    //                     $maildata = $mail->toArray();
    
    //                     foreach ($customers as $customer) {
                            
    //                         $maildata = [
    //                             'name' => $customer->name,
    //                             'logo' => $mail->logo,
    //                             'mail_title' => $mail->title,
    //                             'mail' => $mail,
    //                             'subject' => $mail->subject,
    //                         ];
    //                         Log::info("Sending mail to: {$customer->email}");
    
    //                         try {
    //                             Mail::to($customer->email)
    //                                 ->cc(['1crappcampaign@yopmail.com'])
    //                                 ->send(new CampaignCustomerMail($maildata));
    
    //                             Log::info("Mail Sent Successfully: {$customer->email}");
    
    //                         } catch (\Exception $e) {
    
    //                             Log::error("Mail Failed: {$customer->email}");
    //                             Log::error($e->getMessage());
    //                         }
    //                     }
    //                 } else {
    //                     Log::warning("No customers found for Campaign ID: {$campaign->id}");
    //                 }
    //             }else{
    //                 // gift
    //                 Log::info("Gift schedule detected");
    
    //                 $collectionGiftItem = CollectionItemModel::find($item->item_id);
    
    //                 if (!$collectionGiftItem) {
    //                     Log::error("Collection Item not found: {$item->item_id}");
    //                     continue;
    //                 }
    
    //                 Log::info("Collection Item Found: {$collectionGiftItem->id}");
    
    //                 if ($collectionGiftItem->postal_type != '2') {
    //                     Log::info("Postal type is not gift");
    //                     continue;
    //                 }
    
    //                 $campaign = CampaignModel::find($item->campaign_id);
    //                 $collection = CollectionModel::withCount('gifts')->find($collectionGiftItem->collection_id);
    
    //                 if (!$campaign) {
    //                     Log::error("Campaign not found: {$item->campaign_id}");
    //                     continue;
    //                 }
    
    //                 Log::info("Campaign Found: {$campaign->id}");
    
    //                 $customers = Customer::join('tbl_user_list', 'tbl_user_list.user_id', '=', 'users.id')
    //                     ->where('users.agent_id', $campaign->created_by)
    //                     ->where('tbl_user_list.list_id', $campaign->list_id)
    //                     ->distinct()
    //                     ->select('users.id','users.memberid', 'users.name', 'users.email')
    //                     ->get();
    
    //                 Log::info("Customers Found: ".$customers->count());
    //                 $total_customer = $customers->count();
    //                 if ($customers->isNotEmpty()) {
    
    //                     $gift = GiftModel::with('giftcategory')->find($collectionGiftItem->item_id);
                
    //                     if (!$gift) {
    //                         Log::error("Gift not found: {$collectionGiftItem->item_id}");
    //                         continue;
    //                     }
    //                     $thankyouStatus = false;
    //                     $tyc_category = 'TYC';
    //                     $tyc_name = '';
    //                     $tyc_price = 0;
    //                     if($collectionGiftItem->thankYouStatus == 1){
    //                         $thankyouStatus = true;
    //                         $thankyouCard = ThankYouCardModel::find($collectionGiftItem->tyc_id);
    //                         $tyc_name = $thankyouCard->name;
    //                         $tyc_price = $thankyouCard->price;
    //                     }
    //                     Log::info("Gift Found: {$gift->id}");
    //                     $giftdata = $gift->toArray();
    //                     $gst = (float) (GiftConfigModel::where('key', 'gst')->value('price') ?? 0);
    //                     $courier = (float) (GiftConfigModel::where('key', 'courier')->value('price') ?? 0);
    //                     $handing = (float) (GiftConfigModel::where('key', 'handing')->value('price') ?? 0);
    //                     $adminmail = AuthTempModel::where('category', 5)->first();
    //                     // $maildata = $adminmail->toArray();
    //                     foreach ($customers as $customer) {
                        
    //                         try {
                        
    //                             Log::info("Processing Gift For Customer ID: {$customer->id}");
    //                             $mrp = (float) $gift->mrp;
    //                             $discount = (float) $gift->discount;
    //                             // Discount Amount
    //                             $discountAmount = ($mrp * $discount) / 100;
    //                             // Price after discount
    //                             $discountedPrice = $mrp - $discountAmount;
    //                             // GST Amount
    //                             $gstAmount = ($discountedPrice * $gst) / 100;
    //                             // Final Price
    //                             $finalPrice = $discountedPrice + $gstAmount + $courier + $handing;
    //                             UserGiftModel::create([
    //                                 'collection_id'  => $collectionGiftItem->collection_id,
    //                                 'item_id'  => $item->item_id,
    //                                 'user_id'  => $customer->id,
    //                                 'gift_id'  => $gift->id,
    //                                 'agent_id' => $campaign->created_by,
    //                                 'price'    => round($finalPrice, 2),
    //                                 'status'   => 'pending',
    //                             ]);
                        
    //                             Log::info(
    //                                 "Gift Order Created | Customer: {$customer->id} | Gift: {$gift->id} | Price: {$finalPrice}"
    //                             );
                        
    //                         } catch (\Exception $e) {
                        
    //                             Log::error("Gift Order Creation Failed");
                        
    //                             Log::error([
    //                                 'customer_id' => $customer->id ?? null,
    //                                 'gift_id'     => $gift->id ?? null,
    //                                 'message'     => $e->getMessage(),
    //                                 'file'        => $e->getFile(),
    //                                 'line'        => $e->getLine(),
    //                             ]);
                        
    //                             continue;
    //                         }
    //                         $maildata = [
    //                             'name'           => $customer->name,
    //                             'email'          => $customer->email,
    //                             'memberid'       => $customer->memberid,
    //                             'campaign_title' => $campaign->title,
    //                             'collection_name'=> $collection->title,
    //                             'total_gifts'    => $collection->gifts_count,
    //                             'total_customers'=> $total_customer,
    //                             'gross_value'    => $finalPrice,
    //                             'gift_name'      => $gift->title,
    //                             'gift_category'  => $gift->giftcategory->name,
    //                             'gift_mrp'       => $gift->mrp,
    //                             'tyc_category'   => $tyc_category,
    //                             'tyc_name'       => $tyc_name,
    //                             'tyc_price'      => $tyc_price,
    //                             'tyc_status'     => $thankyouStatus,
    //                             'sub_total'       => $gift->mrp,
    //                             'discount'       => $discount,
    //                             'total_after_discount'=> $gift->mrp-$discount,
    //                             'courier_charge'=> $courier,
    //                             'handling_charge'=> $handing,
    //                             'gst_percent'=> $gst,
    //                             'gst_charge'=> $gstAmount,
    //                             'total_amount_pr_user'=> $finalPrice,
    //                             'gross_order_amount'=> $finalPrice,
    //                             'title'          => $adminmail->title,
    //                             'subject'        => $adminmail->subject,
    //                             'logo'           => $adminmail->logo,
    //                             'top_content'    => $adminmail->top_content,
    //                             'bottom_content' => $adminmail->bottom_content,
    //                             'copyright_text' => $adminmail->copyright_text,
    //                         ];
    //                         Log::info("Sending mail to: {$customer->email}");
    
    //                         try {
    //                             Mail::to('orders@1crapp.com')
    //                                 ->cc(['1crappgiftorders@yopmail.com'])
    //                                 ->send(new AdminGiftMail($maildata));
    
    //                             Log::info("Gift Mail Sent Successfully: {$customer->email}");
    
    //                         } catch (\Exception $e) {
    
    //                             Log::error("Mail Failed: {$customer->email}");
    //                             Log::error($e->getMessage());
    //                         }
    //                     }
                        
    //                 } else {
    //                     Log::warning("No customers found for Campaign ID: {$campaign->id}");
    //                 }
                    
    //             }
    
    //             $item->update([
    //                 'status' => 'completed',
    //                 'sent_at' => now(),
    //             ]);
    
    //             Log::info("Schedule Completed: {$item->id}");
    //         }
    
    //         Log::info('Gift Mail Cron Finished Successfully');
    
    //     } catch (\Exception $e) {
    
    //         Log::error('Cron Fatal Error');
    //         Log::error($e->getMessage());
    //         Log::error($e->getFile().' : '.$e->getLine());
    //     }
    
    //     $this->info('Gift emails processed successfully.');
    // }
}