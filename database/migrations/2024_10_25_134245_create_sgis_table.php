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
        Schema::create('sgis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id'); // Nouvelle colonne users_id après id
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade'); // Clé étrangère pour users_id
            $table->string('code_sgi'); // Nouvelle colonne code_sgi après users_id
            $table->string('designation_sgi'); // Colonne designation_sgi
            $table->string('num_compte_tresor')->unique(); // Colonne num_compte_tresor, unique
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgis');
    }
};
