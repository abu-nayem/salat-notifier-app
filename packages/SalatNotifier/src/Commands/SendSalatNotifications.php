<?php

namespace SalatNotifier\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Notification;
use SalatNotifier\Notifications\SalatTimeNotification;
use SalatNotifier\Interfaces\SalatTimeManagerInterface;

class SendSalatNotifications extends Command
{
    protected $signature = 'salat:notify';
    protected $description = 'Send notifications for Salat times';

    public function handle()
    {
        $interface = App::make(SalatTimeManagerInterface::class);
        $salatTimes = $interface->all();
        foreach ($salatTimes as $salatTime) {
            $timeToSendNotification = now()->addMinutes(10)->format('H:i:s');
             if ($salatTime->time == $timeToSendNotification) {
                Notification::route('slack', env('SLACK_WEBHOOK_URL'))
                    ->notify(new SalatTimeNotification($salatTime->type, $salatTime->time));
             }
        }
    }
}
