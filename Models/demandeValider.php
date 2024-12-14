<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandeValider extends Model
{
    use HasFactory;

    protected $table = 'demande_valider';

    protected $fillable = [
        'id_demandeConge',
    ];
}
