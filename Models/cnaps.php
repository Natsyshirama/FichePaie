<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cnaps extends Model
{
    use HasFactory;
    protected $table = 'cnaps'; // Nom de la table

    protected $primaryKey = 'id'; // Clé primaire

    
    protected $fillable = [
        'id',
        'retunue',
        
    ];

}
