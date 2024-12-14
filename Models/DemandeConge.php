<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeConge extends Model
{
    use HasFactory;

    protected $table = 'demande_conge'; // Nom de la table

    protected $fillable = [
        'id_employer',
        'id_typeConge',
        'duree',
        'dateDebut',
        'dateFin',
        'etat',
    ];

    // Relation avec le modèle Employer
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'id_employer', 'id_employer');
    }

    // Relation avec le modèle TypeConge
    public function typeConge()
    {
        return $this->belongsTo(TypeConge::class, 'id_typeConge', 'id');
    }
    public function demandesValider()
    {
        return $this->hasMany(DemandeValider::class, 'id_demandeConge');
    }
}
