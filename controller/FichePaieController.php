<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Contrat;
use App\Models\DemandeConge;
use App\Models\cnaps;
use App\Models\Assurance_maladie;
use Snappy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class FichePaieController extends Controller
{

     public function showForm()
    {
        return view('formulaireFichePaie');
    }

    public function fichePaie(Request $request)
    {


        $id_employer = $request->input('id_employer');
        $mois = $request->input('mois');
        $annee = $request->input('annee');


        $contrat = Contrat::where('id_employer', $id_employer)->first();

        if (!$contrat) {
            return redirect()->route('fichePaie.show')->with('error', 'Contrat non trouvé');
        }



        $salaireMensuel = $contrat->salaireMensuel;
        $jourSemaine = $contrat->jour_semaine;
        $heureJour = $contrat->heure_jour;
        $tauxjour = $salaireMensuel / $jourSemaine;
        $tauxhoraire = $tauxjour / $heureJour;




        $demandesConges = DemandeConge::where('id_employer', $id_employer)
            ->whereHas('demandesValider')
            ->get();


            $dureeConge = 0;
            foreach ($demandesConges as $demande) {

                $dateDebut = \Carbon\Carbon::parse($demande->dateDebut);
                $dateFin = \Carbon\Carbon::parse($demande->dateFin);

                if (($dateDebut->month == $mois && $dateDebut->year == $annee) ||
                ($dateFin->month == $mois && $dateFin->year == $annee) ||
                ($dateDebut->month < $mois && $dateFin->month == $mois && $dateFin->year == $annee) ||
                ($dateDebut->month == $mois && $dateDebut->year == $annee && $dateFin->month > $mois)) {

        $duree = abs($dateFin->diffInDays($dateDebut)) + 1; // +1 pour inclure le premier jour
        $dureeConge += $duree; // Ajouter à la durée totale des congés            }
        }



    }


        $montantConge = $dureeConge * $tauxhoraire ;



        $cnaps = cnaps::first();
        $assuranceMaladie = Assurance_maladie::first();

        $retenueCnaps = $salaireMensuel * ($cnaps->retenue / 100);
        $retenueAssuranceMaladie = $salaireMensuel * ($assuranceMaladie->retenue / 100);

        $salaireNet = $salaireMensuel - $montantConge - $retenueCnaps - $retenueAssuranceMaladie;


        $data = [
            'id_employer' => $id_employer,
            'mois' => $mois,
            'annee' => $annee,
            'salaire_mensuel' => $salaireMensuel,
            'tauxjour'=> $tauxjour,
            'tauxHoraraire'=> $tauxhoraire,
            'durre_conge'=>$dureeConge,
            'montant_conge' => $montantConge,
            'retenue_cnaps' => $retenueCnaps,
            'retenue_assurance' => $retenueAssuranceMaladie,
            'salaire_net' => $salaireNet,
            'contrat' => $contrat,
            'demandesConges' => $demandesConges,
        ];


     // Retourner la vue avec les données
    return view('fiche_paie', compact('data'));

    }



     public function showFormAll()
    {
        return view('formulaireFichePaieAll');
    }


    public function genereFicheAll(Request $request)
    {
        $mois = $request->input('mois') ?? Carbon::now()->month; // Mois actuel par défaut
        $annee = $request->input('annee') ?? Carbon::now()->year; // Année actuelle par défaut
    
        // Récupérer tous les contrats actifs
        $contrats = Contrat::all();
    
        if ($contrats->isEmpty()) {
            return redirect()->route('fichePaie.showAll')->with('error', 'Aucun contrat actif trouvé');
        }
    
        $fichesPaie = []; // Tableau pour stocker les fiches de paie
    
        foreach ($contrats as $contrat) {
            // Récupérer les informations du contrat
            $id_employer = $contrat->id_employer;
            $salaireMensuel = $contrat->salaireMensuel;
            $jourSemaine = $contrat->jour_semaine;
            $heureJour = $contrat->heure_jour;
    
            $tauxjour = $salaireMensuel / $jourSemaine;
            $tauxhoraire = $tauxjour / $heureJour;
    
            // Calculer les congés validés
            $demandesConges = DemandeConge::where('id_employer', $id_employer)
                ->whereHas('demandesValider')
                ->get();
    
            $dureeConge = 0;
            foreach ($demandesConges as $demande) {
                $dateDebut = Carbon::parse($demande->dateDebut);
                $dateFin = Carbon::parse($demande->dateFin);
    
                if (($dateDebut->month == $mois && $dateDebut->year == $annee) ||
                    ($dateFin->month == $mois && $dateFin->year == $annee) ||
                    ($dateDebut->month < $mois && $dateFin->month == $mois && $dateFin->year == $annee) ||
                    ($dateDebut->month == $mois && $dateDebut->year == $annee && $dateFin->month > $mois)) {
                    $duree = abs($dateFin->diffInDays($dateDebut)) + 1; // Inclure le premier jour
                    $dureeConge += $duree;
                }
            }
    
            $montantConge = $dureeConge * $tauxhoraire ;
    
            // Calcul des retenues
            $cnaps = cnaps::first();
            $assuranceMaladie = Assurance_maladie::first();
    
            $retenueCnaps = $salaireMensuel * ($cnaps->retenue / 100);
            $retenueAssuranceMaladie = $salaireMensuel * ($assuranceMaladie->retenue / 100);
    
            // Salaire net
            $salaireNet = $salaireMensuel - $montantConge - $retenueCnaps - $retenueAssuranceMaladie;
    
            // Préparer les données pour la fiche de paie
            $fichePaie = [
                'id_employer' => $id_employer,
                'mois' => $mois,
                'annee' => $annee,
                'salaire_mensuel' => $salaireMensuel,
                'tauxjour' => $tauxjour,
                'tauxhoraire' => $tauxhoraire,
                'duree_conge' => $dureeConge,
                'montant_conge' => $montantConge,
                'retenue_cnaps' => $retenueCnaps,
                'retenue_assurance' => $retenueAssuranceMaladie,
                'salaire_net' => $salaireNet,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $fichebd = [
                'id_employer' => $id_employer,
                'salaire_net' => $salaireNet,
                'mois' => $mois,
                'annee' => $annee,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
    
            // Ajouter la fiche au tableau
            $fichesPaie[] = $fichePaie;
            
    
            // Enregistrer dans la base de données
            DB::table('fiches_paie')->insert($fichebd);
        }
    
        // Retourner la vue avec les fiches générées
        return view('fichePaieAll', ['fichesPaie' => $fichesPaie]);
    }
    

}

//use App\Http\Controllers\FichePaieController;

// Route pour afficher le formulaire
//Route::get('fichePaie', [FichePaieController::class, 'showForm'])->name('fichePaie.show');

// Route pour générer la fiche de paie
//Route::get('fichePaie/generate', [FichePaieController::class, 'FichePaie'])->name('fichePaie.generate');


// Route pour afficher le formulaire
//Route::get('fichePaieAll', [FichePaieController::class, 'showFormAll'])->name('fichePaie.showAll');
//Route::get('fichePaie/generateAll', [FichePaieController::class, 'genereFicheAll'])->name('fichePaie.generateAll');