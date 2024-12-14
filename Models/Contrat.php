<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $table = 'contrats'; // Nom de la table

    protected $primaryKey = 'id_contrat'; // Clé primaire

    public $timestamps = true; // Si vous souhaitez utiliser les timestamps (created_at, updated_at)

    protected $fillable = [
        'id_employer',
        'description',
        'tauxHoraire',
        'dateDebut',
        'dateFin',
        'annee',
        'temps',
        'salaireMensuel',
        'jour_semaine',
        'heure_jour',
        'etat',
    ];

    // Définir la relation avec le modèle Employer
    public function employer()
{
    return $this->belongsTo(Employer::class, 'id_employer', 'id_employer'); // Préciser la clé étrangère et la clé primaire
}
}
