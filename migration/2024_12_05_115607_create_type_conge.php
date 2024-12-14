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
        Schema::create('typeConge', function (Blueprint $table) {
            $table->id(); // ID auto-incrémenté
            $table->string('nom', 100); // Nom du type de congé
            $table->decimal('pourcentageRenumeration', 5, 2); // Pourcentage de rémunération
            $table->decimal('jourmax');
            $table->timestamps(); // Champs created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('typeConge');
    }
};
