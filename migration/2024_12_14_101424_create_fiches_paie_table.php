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
        Schema::create('fiches_paie', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_employer');
        $table->integer('mois');
        $table->integer('annee');
        $table->decimal('salaire_net', 10, 2);
        $table->timestamps();
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiches_paie');
    }
};
