<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CollectionItem;
use App\Models\CampaignSchedule;
use App\Mail\GiftMail;
use Mail;
use Carbon\Carbon;

class SendGiftMailCommand extends Command
{
    protected $signature = 'gift:send-mail';
    protected $description = 'Send scheduled gift emails';

    public function handle()
    {
        $fromTime = now()->copy()->subHours(2)->format('H:i:s');
        $toTime   = now()->copy()->addHours(2)->format('H:i:s');
        $items = CampaignSchedule::where('status', 'pending')
            ->whereDate('start_date', now()->toDateString())
            ->whereBetween('schedule_time', [$fromTime, $toTime])
            ->get();
        foreach ($items as $item) {
            $item->update([
                'status'  => 'completed',
                'sent_at' => now(),
            ]);
        }

        $this->info('Gift emails processed successfully.');
    }
}