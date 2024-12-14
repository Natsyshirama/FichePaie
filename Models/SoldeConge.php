<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldeConge extends Model
{
    use HasFactory;

    protected $table = 'soldes_conges';

    protected $fillable = [
        'id_employer',
        'solde_total',
        'solde_utilise',
        'idType_conge',
    ];
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'id_employer', 'id_employer');
    }
    public function typeConge()
{
    return $this->belongsTo(TypeConge::class, 'idType_conge');
}
}
