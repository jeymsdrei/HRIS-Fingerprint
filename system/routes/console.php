<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('backup:data')->everyThreeHours();

// Real-time biometric sync every minute
Schedule::command('biometric:sync')->everyMinute()->withoutOverlapping();

// Process today's attendance every 5 minutes
Schedule::command('attendance:process --date=today')->everyFiveMinutes()->withoutOverlapping();
