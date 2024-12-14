<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id('id_contrat'); // ID du contrat
            $table->unsignedBigInteger('id_employer'); // ID de l'employé
            $table->text('description'); // Description du contrat
            $table->decimal('tauxHoraire', 8, 2); // Taux horaire
            $table->date('dateDebut'); // Date de début
            $table->date('dateFin')->default('9999-12-31'); // Date de fin par défaut
            $table->integer('annee'); // Année du contrat
            $table->string('temps');
            $table->integer('salaireMensuel');
            $table->integer('jour_semaine')->default(5); // Nombre de jours travaillés par semaine
            $table->decimal('heure_jour', 5, 2)->default(8.00); // Heures travaillées par jour
            $table->boolean('etat')->default(true);

            // Clé étrangère vers la table employer
            $table->foreign('id_employer')->references('id_employer')->on('employer')->onDelete('cascade');

            $table->timestamps(); // Champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
