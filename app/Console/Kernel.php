<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('scrape:indeed')->hourly();
        $schedule->command('scrape:glassdoor')->hourly();
        $schedule->command('scrape:larajobs')->hourly();
        $schedule->command('scrape:remotive')->hourly();
        $schedule->command('scrape:weworkremotely')->hourly();
        $schedule->command('scrape:bestremotejob')->hourly();
        $schedule->command('scrape:remoteco')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
