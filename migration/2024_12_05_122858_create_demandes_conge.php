<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    
    public function up()
    {
    Schema::create('demande_conge', function (Blueprint $table) {
    $table->id(); // ID auto-incrémenté
    $table->unsignedBigInteger('id_employer'); // ID de l'employé
    $table->unsignedBigInteger('id_typeConge'); // ID du type de congé
    $table->integer('duree'); // Durée du congé
    $table->date('dateDebut'); // Date de début
    $table->date('dateFin'); // Date de fin
    $table->boolean('etat')->default(0); // État de la demande, par défaut à 0

    // Clés étrangères
    $table->foreign('id_employer')->references('id_employer')->on('employer')->onDelete('cascade');
    $table->foreign('id_typeConge')->references('id')->on('typeConge')->onDelete('cascade');

    $table->timestamps(); // Champs created_at et updated_at
});
}

public function down()
{
Schema::dropIfExists('demande_conge');
}
};
