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
        Schema::create('numero_comptes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->string('num_compte')->unique(); // Numéro de compte, doit être unique
            $table->string('libelle_numcompte'); // Libellé du numéro de compte
            $table->string('num_compte_prod_finan')->unique(); // Numéro de compte de produits financier
            $table->foreign('users_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numero_comptes');
    }
};
