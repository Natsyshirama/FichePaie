<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeConge extends Model
{
    use HasFactory;

    protected $table = 'typeConge'; // Nom de la table

    // Les colonnes qui peuvent être remplies en masse
    protected $fillable = [
        'nom',
        'pourcentageRenumeration',
        'jourmax',
    ];
}
