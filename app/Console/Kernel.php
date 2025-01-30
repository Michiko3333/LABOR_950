<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\BatchManagement;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $batches = BatchManagement::where('delete_flg', 0)->get();

        if($batches->count()) {
            foreach($batches as $batch) {
                $schedule->command($batch->command)
                    ->dailyAt($batch->time_specification)
                    ->withoutOverlapping()
                    ->onFailure(function () use ($batch) {
                        \Log::error("{$batch->command} failed");
                    })
                    ->onSuccess(function () use ($batch) {
                        \Log::info("{$batch->command} succeeded");
                    });
            }
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
