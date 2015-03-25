<?php namespace CompassHB\Www\Console;

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
        'CompassHB\Www\Console\Commands\DatabaseBackup',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('db:backup')
                    ->dailyAt('23:59')
                    ->thenPing(env('ENVOYER_HEARTBEAT'));
    }
}
