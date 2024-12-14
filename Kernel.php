<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class kernel extends ConsoleKernel
{
    /**
     * Les commandes Artisan disponibles pour votre application.
     *
     * @var array
     */protected $commands = [
    \App\Console\Commands\GenerateFichesPaie::class,
];


    /**
     * Définir la planification des tâches.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
{
    $schedule->command('app:generate-fiches-paie')->monthlyOn(1, '23:59');
}


    /**
     * Définir les commandes Artisan qui devraient être exécutées en arrière-plan.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
