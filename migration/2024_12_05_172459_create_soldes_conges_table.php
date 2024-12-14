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
        Schema::create('soldes_conges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_employer');
            $table->unsignedBigInteger('idType_conge');
            $table->integer('solde_total')->default(0);
            $table->integer('solde_utilise')->default(0);
            $table->integer('jour_max')->default(0); // Maximum de jours de congé
            $table->timestamps();

            $table->foreign('id_employer')->references('id_employer')->on('employer')->onDelete('cascade');
            $table->foreign('idType_conge')->references('id')->on('typeConge')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soldes_conges');
    }
};
