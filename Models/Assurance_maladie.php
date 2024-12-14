<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance_maladie extends Model
{
    use HasFactory;
    protected $table = 'assurance_maladie'; // Nom de la table

    protected $primaryKey = 'id'; // Clé primaire

    protected $fillable = [
        'id',
        'nom',
        'retunue',
        
    ];
}
