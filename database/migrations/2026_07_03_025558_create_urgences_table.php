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
        Schema::create('urgences', function (Blueprint $table) {
            $table->id();
            $table->string('titre'); // ex: LES PHARMACIES DE GARDE
            $table->string('sous_titre')->nullable(); // ex: DE GARDE DE LA SEMAINE
            $table->date('date_fin')->nullable(); // ex: JUSQU’AU 08 NOVEMBRE 2026
            $table->json('items'); // <- Stocke la liste AVENIR, HARINOSY...
            $table->string('source')->nullable(); // ex: PHARMACIE ANJARA
            $table->boolean('is_active')->default(true); // Pour n'afficher que la plus récente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urgences');
    }
};
