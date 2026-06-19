<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CollectionItemModel;
use App\Models\CampaignSchedule;
use App\Models\GiftMailModel;
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
        Log::info('Gift Mail Cron Started');
    
        try {
    
            $fromTime = now()->copy()->subHours(2)->format('H:i:s');
            $toTime   = now()->copy()->addHours(2)->format('H:i:s');
    
            Log::info("Searching schedules between {$fromTime} and {$toTime}");
    
            $items = CampaignSchedule::where('status', 'pending')
                ->whereDate('start_date', now()->toDateString())
                ->whereBetween('schedule_time', [$fromTime, $toTime])
                ->get();
    
            Log::info('Schedules found: '.$items->count());
    
            foreach ($items as $item) {
    
                Log::info("Processing Schedule ID: {$item->id}");
    
                // email
                if ($item->type == 'email') {
                    Log::info("Email schedule detected");
    
                    $collectionItem = CollectionItemModel::find($item->item_id);
    
                    if (!$collectionItem) {
                        Log::error("Collection Item not found: {$item->item_id}");
                        continue;
                    }
    
                    Log::info("Collection Item Found: {$collectionItem->id}");
    
                    if ($collectionItem->postal_type != '1') {
                        Log::info("Postal type is not email");
                        continue;
                    }
    
                    $campaign = CampaignModel::find($item->campaign_id);
    
                    if (!$campaign) {
                        Log::error("Campaign not found: {$item->campaign_id}");
                        continue;
                    }
    
                    Log::info("Campaign Found: {$campaign->id}");
    
                    $customers = Customer::join('tbl_user_list', 'tbl_user_list.user_id', '=', 'users.id')
                        ->where('users.agent_id', $campaign->created_by)
                        ->where('tbl_user_list.list_id', $campaign->list_id)
                        ->distinct()
                        ->select('users.name', 'users.email')
                        ->get();
    
                    Log::info("Customers Found: ".$customers->count());
    
                    if ($customers->isNotEmpty()) {
    
                        $mail = GiftMailModel::find($collectionItem->item_id);
    
                        if (!$mail) {
                            Log::error("Gift Mail not found: {$collectionItem->item_id}");
                            continue;
                        }
    
                        Log::info("Gift Mail Found: {$mail->id}");
    
                        $maildata = $mail->toArray();
    
                        foreach ($customers as $customer) {
                            
                            $maildata = [
                                'name' => $customer->name,
                                'logo' => $mail->logo,
                                'mail_title' => $mail->title,
                                'mail' => $mail,
                                'subject' => $mail->subject,
                            ];
                            Log::info("Sending mail to: {$customer->email}");
    
                            try {
                                Mail::to($customer->email)
                                    ->cc(['1crappcampaign@yopmail.com'])
                                    ->send(new CampaignCustomerMail($maildata));
    
                                Log::info("Mail Sent Successfully: {$customer->email}");
    
                            } catch (\Exception $e) {
    
                                Log::error("Mail Failed: {$customer->email}");
                                Log::error($e->getMessage());
                            }
                        }
                    } else {
                        Log::warning("No customers found for Campaign ID: {$campaign->id}");
                    }
                }else{
                    // gift
                    Log::info("Gift schedule detected");
    
                    $collectionGiftItem = CollectionItemModel::find($item->item_id);
    
                    if (!$collectionGiftItem) {
                        Log::error("Collection Item not found: {$item->item_id}");
                        continue;
                    }
    
                    Log::info("Collection Item Found: {$collectionGiftItem->id}");
    
                    if ($collectionGiftItem->postal_type != '2') {
                        Log::info("Postal type is not gift");
                        continue;
                    }
    
                    $campaign = CampaignModel::find($item->campaign_id);
                    $collection = CollectionModel::withCount('gifts')->find($collectionGiftItem->collection_id);
    
                    if (!$campaign) {
                        Log::error("Campaign not found: {$item->campaign_id}");
                        continue;
                    }
    
                    Log::info("Campaign Found: {$campaign->id}");
    
                    $customers = Customer::join('tbl_user_list', 'tbl_user_list.user_id', '=', 'users.id')
                        ->where('users.agent_id', $campaign->created_by)
                        ->where('tbl_user_list.list_id', $campaign->list_id)
                        ->distinct()
                        ->select('users.id','users.memberid', 'users.name', 'users.email')
                        ->get();
    
                    Log::info("Customers Found: ".$customers->count());
                    $total_customer = $customers->count();
                    if ($customers->isNotEmpty()) {
    
                        $gift = GiftModel::with('giftcategory')->find($collectionGiftItem->item_id);
                
                        if (!$gift) {
                            Log::error("Gift not found: {$collectionGiftItem->item_id}");
                            continue;
                        }
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
                        Log::info("Gift Found: {$gift->id}");
                        $giftdata = $gift->toArray();
                        $gst = (float) (GiftConfigModel::where('key', 'gst')->value('price') ?? 0);
                        $courier = (float) (GiftConfigModel::where('key', 'courier')->value('price') ?? 0);
                        $handing = (float) (GiftConfigModel::where('key', 'handing')->value('price') ?? 0);
                        $adminmail = AuthTempModel::where('category', 5)->first();
                        // $maildata = $adminmail->toArray();
                        foreach ($customers as $customer) {
                        
                            try {
                        
                                Log::info("Processing Gift For Customer ID: {$customer->id}");
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
                                UserGiftModel::create([
                                    'collection_id'  => $collectionGiftItem->collection_id,
                                    'item_id'  => $item->item_id,
                                    'user_id'  => $customer->id,
                                    'gift_id'  => $gift->id,
                                    'agent_id' => $campaign->created_by,
                                    'price'    => round($finalPrice, 2),
                                    'status'   => 'pending',
                                ]);
                        
                                Log::info(
                                    "Gift Order Created | Customer: {$customer->id} | Gift: {$gift->id} | Price: {$finalPrice}"
                                );
                        
                            } catch (\Exception $e) {
                        
                                Log::error("Gift Order Creation Failed");
                        
                                Log::error([
                                    'customer_id' => $customer->id ?? null,
                                    'gift_id'     => $gift->id ?? null,
                                    'message'     => $e->getMessage(),
                                    'file'        => $e->getFile(),
                                    'line'        => $e->getLine(),
                                ]);
                        
                                continue;
                            }
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
                                'sub_total'       => $gift->mrp,
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
                            Log::info("Sending mail to: {$customer->email}");
    
                            try {
                                Mail::to('orders@1crapp.com')
                                    ->cc(['1crappgiftorders@yopmail.com'])
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
                    
                }
    
                $item->update([
                    'status' => 'completed',
                    'sent_at' => now(),
                ]);
    
                Log::info("Schedule Completed: {$item->id}");
            }
    
            Log::info('Gift Mail Cron Finished Successfully');
    
        } catch (\Exception $e) {
    
            Log::error('Cron Fatal Error');
            Log::error($e->getMessage());
            Log::error($e->getFile().' : '.$e->getLine());
        }
    
        $this->info('Gift emails processed successfully.');
    }
}