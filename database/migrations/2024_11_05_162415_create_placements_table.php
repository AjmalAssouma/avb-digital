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
        Schema::create('placements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sgis_id')->constrained('sgis')->onDelete('cascade');
            $table->string('num_compte')->unique();
            $table->string('type_placement');
            $table->string('nom_placement');
            $table->string('periodicite');
            $table->string('taux_annuel');
            $table->string('taux_periode');
            $table->integer('nbre_titre');
            $table->string('valeur_titre');
            $table->string('valeur_acq_titre');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('duree');
            $table->string('gain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placements');
    }
};
