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
        Schema::create('detail_placements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->unsignedBigInteger('placements_id')->nullable();
            $table->integer('annee_exercice')->nullable();
            $table->date('date_dernier_paiement')->nullable();
            $table->date('date_arret')->nullable();
            $table->integer('nbre_jrs_icne')->nullable();
            $table->string('solde_31_12_n_1')->nullable();
            $table->string('acquisition')->nullable();
            $table->string('remboursement')->nullable();
            $table->string('solde_31_12_n')->nullable();
            $table->string('solde_comptable')->nullable();
            $table->string('ecart')->nullable();
            $table->string('provision_31_12_n')->nullable();
            $table->string('ext_icne_31_12_n_1')->nullable();
            $table->string('interet_recu_31_12_n')->nullable();
            $table->string('icne_31_12_n')->nullable();
            $table->string('interet_controle')->nullable();
            $table->string('interet_comptable')->nullable();
            $table->string('interet_attendu')->nullable();
            $table->string('ecart_paiement')->nullable();
            $table->string('ecart_comptabilise')->nullable();
            $table->string('icne_comptable_31_12_n')->nullable();
            $table->string('ecart_icne')->nullable();
            $table->string('dividende')->nullable();
            $table->string('rendement')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('placements_id')->references('id')->on('placements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_placements');
    }
};
