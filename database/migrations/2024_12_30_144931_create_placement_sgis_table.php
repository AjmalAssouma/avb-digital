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
        Schema::create('placement_sgis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id'); // Clé étrangère vers users
            $table->unsignedBigInteger('placements_id'); // Clé étrangère vers placements
            $table->unsignedBigInteger('sgis_id'); // Clé étrangère vers sgis
            $table->string('nbre_titre')->nullable(); // Nombre de titres
            $table->string('valeur_titre')->nullable(); // Valeur des titres
            $table->string('valeur_acq_titre')->nullable(); // Valeur d'acquisition des titres
            $table->string('gain')->nullable(); // Gain
            $table->timestamps();

            // Définir les clés étrangères
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('placements_id')->references('id')->on('placements')->onDelete('cascade');
            $table->foreign('sgis_id')->references('id')->on('sgis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placement_sgis');
    }
};
