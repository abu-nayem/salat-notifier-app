<?php

namespace App\Console;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use SalatNotifier\SalatTimeManager;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Notification;
use SalatNotifier\Notifications\SalatTimeNotification;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Log::info('Scheduler is working!');
        })->everyMinute();
        $salatManager = new SalatTimeManager();
        $salatTimes   = $salatManager->getSalatTimes();
        $salatTypes   = ['fajr', 'dhuhr', 'asr', 'maghrib', 'isha'];
        foreach ($salatTypes as $prayer) {
            $time = Carbon::parse($salatTimes->$prayer)->subMinutes(10);
            // dd($time);
            $schedule->call(function () use ($prayer) {
                Notification::route('slack', config('salat-notifier.slack_webhook_url'))
                    ->notify(new SalatTimeNotification($prayer));
            })->everyMinute($time->format('H:i'));
        }
    }
    

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
