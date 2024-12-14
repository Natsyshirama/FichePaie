<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('demande_valider', function (Blueprint $table) {
            $table->id(); // ID auto-incrémenté
            $table->unsignedBigInteger('id_demandeConge'); // Référence à la demande de congé
            $table->timestamps(); // Champs created_at et updated_at

            // Clé étrangère
            $table->foreign('id_demandeConge')->references('id')->on('demande_conge')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_valider');
    }
};
