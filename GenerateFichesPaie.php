<?php

namespace App\Console\Commands;
use App\Http\Controllers\FichePaieController;
use Illuminate\Console\Command;

class GenerateFichesPaie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-fiches-paie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genere automatic les Fiche Paie a chaque fin de mois';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fichePaieController = new FichePaieController();
        $request = request()->merge([
            'mois' => now()->month,  // Mois actuel
            'annee' => now()->year   // Année actuelle
        ]);

        // Appeler la méthode genereFicheAll
        $fichePaieController->genereFicheAll($request);
        $this->info('Fiches de paie générées avec succès.');
    }
}
