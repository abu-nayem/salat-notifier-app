<?php

namespace SalatNotifier\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class SalatTimeNotification extends Notification
{
    protected $time;

    public function __construct($time)
    {
        $this->time = $time;
    }

    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        $webhookUrl = config('salat-notifier.slack_webhook_url');

        return (new SlackMessage)
            ->from('SalatNotifier')
            ->content("It's almost time for {$this->time} prayer.")
            ->to('#salat-times');
    }
}

